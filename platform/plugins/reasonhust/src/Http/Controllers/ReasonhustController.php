<?php

namespace Botble\Reasonhust\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Reasonhust\Http\Requests\ReasonhustRequest;
use Botble\Reasonhust\Repositories\Interfaces\ReasonhustInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Reasonhust\Tables\ReasonhustTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Reasonhust\Forms\ReasonhustForm;
use Botble\Base\Forms\FormBuilder;

class ReasonhustController extends BaseController
{
    /**
     * @var ReasonhustInterface
     */
    protected $reasonhustRepository;

    /**
     * ReasonhustController constructor.
     * @param ReasonhustInterface $reasonhustRepository
     */
    public function __construct(ReasonhustInterface $reasonhustRepository)
    {
        $this->reasonhustRepository = $reasonhustRepository;
    }

    /**
     * Display all reasonhusts
     * @param ReasonhustTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(ReasonhustTable $table)
    {

        page_title()->setTitle(trans('plugins/reasonhust::reasonhust.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/reasonhust::reasonhust.create'));

        return $formBuilder->create(ReasonhustForm::class)->renderForm();
    }

    /**
     * Insert new Reasonhust into database
     *
     * @param ReasonhustRequest $request
     * @return BaseHttpResponse
     */
    public function store(ReasonhustRequest $request, BaseHttpResponse $response)
    {
        $reasonhust = $this->reasonhustRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(REASONHUST_MODULE_SCREEN_NAME, $request, $reasonhust));

        return $response
            ->setPreviousUrl(route('reasonhust.index'))
            ->setNextUrl(route('reasonhust.edit', $reasonhust->id))
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
        $reasonhust = $this->reasonhustRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $reasonhust));

        page_title()->setTitle(trans('plugins/reasonhust::reasonhust.edit') . ' "' . $reasonhust->name . '"');

        return $formBuilder->create(ReasonhustForm::class, ['model' => $reasonhust])->renderForm();
    }

    /**
     * @param $id
     * @param ReasonhustRequest $request
     * @return BaseHttpResponse
     */
    public function update($id, ReasonhustRequest $request, BaseHttpResponse $response)
    {
        $reasonhust = $this->reasonhustRepository->findOrFail($id);

        $reasonhust->fill($request->input());

        $this->reasonhustRepository->createOrUpdate($reasonhust);

        event(new UpdatedContentEvent(REASONHUST_MODULE_SCREEN_NAME, $request, $reasonhust));

        return $response
            ->setPreviousUrl(route('reasonhust.index'))
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
            $reasonhust = $this->reasonhustRepository->findOrFail($id);

            $this->reasonhustRepository->delete($reasonhust);

            event(new DeletedContentEvent(REASONHUST_MODULE_SCREEN_NAME, $request, $reasonhust));

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
            $reasonhust = $this->reasonhustRepository->findOrFail($id);
            $this->reasonhustRepository->delete($reasonhust);
            event(new DeletedContentEvent(REASONHUST_MODULE_SCREEN_NAME, $request, $reasonhust));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
