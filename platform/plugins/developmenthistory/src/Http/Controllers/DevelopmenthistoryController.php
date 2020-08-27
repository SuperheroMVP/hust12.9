<?php

namespace Botble\Developmenthistory\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Developmenthistory\Http\Requests\DevelopmenthistoryRequest;
use Botble\Developmenthistory\Repositories\Interfaces\DevelopmenthistoryInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Developmenthistory\Tables\DevelopmenthistoryTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Developmenthistory\Forms\DevelopmenthistoryForm;
use Botble\Base\Forms\FormBuilder;

class DevelopmenthistoryController extends BaseController
{
    /**
     * @var DevelopmenthistoryInterface
     */
    protected $developmenthistoryRepository;

    /**
     * DevelopmenthistoryController constructor.
     * @param DevelopmenthistoryInterface $developmenthistoryRepository
     */
    public function __construct(DevelopmenthistoryInterface $developmenthistoryRepository)
    {
        $this->developmenthistoryRepository = $developmenthistoryRepository;
    }

    /**
     * Display all developmenthistories
     * @param DevelopmenthistoryTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(DevelopmenthistoryTable $table)
    {

        page_title()->setTitle(trans('plugins/developmenthistory::developmenthistory.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/developmenthistory::developmenthistory.create'));

        return $formBuilder->create(DevelopmenthistoryForm::class)->renderForm();
    }

    /**
     * Insert new Developmenthistory into database
     *
     * @param DevelopmenthistoryRequest $request
     * @return BaseHttpResponse
     */
    public function store(DevelopmenthistoryRequest $request, BaseHttpResponse $response)
    {
        $developmenthistory = $this->developmenthistoryRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(DEVELOPMENTHISTORY_MODULE_SCREEN_NAME, $request, $developmenthistory));

        return $response
            ->setPreviousUrl(route('developmenthistory.index'))
            ->setNextUrl(route('developmenthistory.edit', $developmenthistory->id))
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
        $developmenthistory = $this->developmenthistoryRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $developmenthistory));

        page_title()->setTitle(trans('plugins/developmenthistory::developmenthistory.edit') . ' "' . $developmenthistory->name . '"');

        return $formBuilder->create(DevelopmenthistoryForm::class, ['model' => $developmenthistory])->renderForm();
    }

    /**
     * @param $id
     * @param DevelopmenthistoryRequest $request
     * @return BaseHttpResponse
     */
    public function update($id, DevelopmenthistoryRequest $request, BaseHttpResponse $response)
    {
        $developmenthistory = $this->developmenthistoryRepository->findOrFail($id);

        $developmenthistory->fill($request->input());

        $this->developmenthistoryRepository->createOrUpdate($developmenthistory);

        event(new UpdatedContentEvent(DEVELOPMENTHISTORY_MODULE_SCREEN_NAME, $request, $developmenthistory));

        return $response
            ->setPreviousUrl(route('developmenthistory.index'))
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
            $developmenthistory = $this->developmenthistoryRepository->findOrFail($id);

            $this->developmenthistoryRepository->delete($developmenthistory);

            event(new DeletedContentEvent(DEVELOPMENTHISTORY_MODULE_SCREEN_NAME, $request, $developmenthistory));

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
            $developmenthistory = $this->developmenthistoryRepository->findOrFail($id);
            $this->developmenthistoryRepository->delete($developmenthistory);
            event(new DeletedContentEvent(DEVELOPMENTHISTORY_MODULE_SCREEN_NAME, $request, $developmenthistory));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
