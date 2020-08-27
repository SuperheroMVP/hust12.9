<?php

namespace Botble\Abouthust\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Abouthust\Http\Requests\AbouthustRequest;
use Botble\Abouthust\Repositories\Interfaces\AbouthustInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Abouthust\Tables\AbouthustTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Abouthust\Forms\AbouthustForm;
use Botble\Base\Forms\FormBuilder;

class AbouthustController extends BaseController
{
    /**
     * @var AbouthustInterface
     */
    protected $abouthustRepository;

    /**
     * AbouthustController constructor.
     * @param AbouthustInterface $abouthustRepository
     */
    public function __construct(AbouthustInterface $abouthustRepository)
    {
        $this->abouthustRepository = $abouthustRepository;
    }

    /**
     * Display all abouthusts
     * @param AbouthustTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(AbouthustTable $table)
    {

        page_title()->setTitle(trans('plugins/abouthust::abouthust.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/abouthust::abouthust.create'));

        return $formBuilder->create(AbouthustForm::class)->renderForm();
    }

    /**
     * Insert new Abouthust into database
     *
     * @param AbouthustRequest $request
     * @return BaseHttpResponse
     */
    public function store(AbouthustRequest $request, BaseHttpResponse $response)
    {
        $abouthust = $this->abouthustRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(ABOUTHUST_MODULE_SCREEN_NAME, $request, $abouthust));

        return $response
            ->setPreviousUrl(route('abouthust.index'))
            ->setNextUrl(route('abouthust.edit', $abouthust->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    /**
     * Show edit form
     *
     * @param $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function edit($id, FormBuilder $formBuilder, Request $request)
    {
        $abouthust = $this->abouthustRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $abouthust));

        page_title()->setTitle(trans('plugins/abouthust::abouthust.edit') . ' "' . $abouthust->name . '"');

        return $formBuilder->create(AbouthustForm::class, ['model' => $abouthust])->renderForm();
    }

    /**
     * @param $id
     * @param AbouthustRequest $request
     * @return BaseHttpResponse
     */
    public function update($id, AbouthustRequest $request, BaseHttpResponse $response)
    {
        $abouthust = $this->abouthustRepository->findOrFail($id);

        $abouthust->fill($request->input());

        $this->abouthustRepository->createOrUpdate($abouthust);

        event(new UpdatedContentEvent(ABOUTHUST_MODULE_SCREEN_NAME, $request, $abouthust));

        return $response
            ->setPreviousUrl(route('abouthust.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return BaseHttpResponse
     */
    public function destroy(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $abouthust = $this->abouthustRepository->findOrFail($id);

            $this->abouthustRepository->delete($abouthust);

            event(new DeletedContentEvent(ABOUTHUST_MODULE_SCREEN_NAME, $request, $abouthust));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.cannot_delete'));
        }
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws Exception
     */
    public function deletes(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $abouthust = $this->abouthustRepository->findOrFail($id);
            $this->abouthustRepository->delete($abouthust);
            event(new DeletedContentEvent(ABOUTHUST_MODULE_SCREEN_NAME, $request, $abouthust));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
