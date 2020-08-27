<?php

namespace Botble\Slidebar\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Slidebar\Http\Requests\SlidebarRequest;
use Botble\Slidebar\Repositories\Interfaces\SlidebarInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Slidebar\Tables\SlidebarTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Slidebar\Forms\SlidebarForm;
use Botble\Base\Forms\FormBuilder;

class SlidebarController extends BaseController
{
    /**
     * @var SlidebarInterface
     */
    protected $slidebarRepository;

    /**
     * SlidebarController constructor.
     * @param SlidebarInterface $slidebarRepository
     */
    public function __construct(SlidebarInterface $slidebarRepository)
    {
        $this->slidebarRepository = $slidebarRepository;
    }

    /**
     * Display all slidebars
     * @param SlidebarTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(SlidebarTable $table)
    {

        page_title()->setTitle(trans('plugins/slidebar::slidebar.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/slidebar::slidebar.create'));

        return $formBuilder->create(SlidebarForm::class)->renderForm();
    }

    /**
     * Insert new Slidebar into database
     *
     * @param SlidebarRequest $request
     * @return BaseHttpResponse
     */
    public function store(SlidebarRequest $request, BaseHttpResponse $response)
    {
        $slidebar = $this->slidebarRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(SLIDEBAR_MODULE_SCREEN_NAME, $request, $slidebar));

        return $response
            ->setPreviousUrl(route('slidebar.index'))
            ->setNextUrl(route('slidebar.edit', $slidebar->id))
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
        $slidebar = $this->slidebarRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $slidebar));

        page_title()->setTitle(trans('plugins/slidebar::slidebar.edit') . ' "' . $slidebar->name . '"');

        return $formBuilder->create(SlidebarForm::class, ['model' => $slidebar])->renderForm();
    }

    /**
     * @param $id
     * @param SlidebarRequest $request
     * @return BaseHttpResponse
     */
    public function update($id, SlidebarRequest $request, BaseHttpResponse $response)
    {
        $slidebar = $this->slidebarRepository->findOrFail($id);

        $slidebar->fill($request->input());

        $this->slidebarRepository->createOrUpdate($slidebar);

        event(new UpdatedContentEvent(SLIDEBAR_MODULE_SCREEN_NAME, $request, $slidebar));

        return $response
            ->setPreviousUrl(route('slidebar.index'))
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
            $slidebar = $this->slidebarRepository->findOrFail($id);

            $this->slidebarRepository->delete($slidebar);

            event(new DeletedContentEvent(SLIDEBAR_MODULE_SCREEN_NAME, $request, $slidebar));

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
            $slidebar = $this->slidebarRepository->findOrFail($id);
            $this->slidebarRepository->delete($slidebar);
            event(new DeletedContentEvent(SLIDEBAR_MODULE_SCREEN_NAME, $request, $slidebar));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
