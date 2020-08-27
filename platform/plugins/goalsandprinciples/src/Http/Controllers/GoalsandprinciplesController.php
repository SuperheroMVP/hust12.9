<?php

namespace Botble\Goalsandprinciples\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Goalsandprinciples\Http\Requests\GoalsandprinciplesRequest;
use Botble\Goalsandprinciples\Repositories\Interfaces\GoalsandprinciplesInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Goalsandprinciples\Tables\GoalsandprinciplesTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Goalsandprinciples\Forms\GoalsandprinciplesForm;
use Botble\Base\Forms\FormBuilder;

class GoalsandprinciplesController extends BaseController
{
    /**
     * @var GoalsandprinciplesInterface
     */
    protected $goalsandprinciplesRepository;

    /**
     * GoalsandprinciplesController constructor.
     * @param GoalsandprinciplesInterface $goalsandprinciplesRepository
     */
    public function __construct(GoalsandprinciplesInterface $goalsandprinciplesRepository)
    {
        $this->goalsandprinciplesRepository = $goalsandprinciplesRepository;
    }

    /**
     * Display all goalsandprinciples
     * @param GoalsandprinciplesTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(GoalsandprinciplesTable $table)
    {

        page_title()->setTitle(trans('plugins/goalsandprinciples::goalsandprinciples.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/goalsandprinciples::goalsandprinciples.create'));

        return $formBuilder->create(GoalsandprinciplesForm::class)->renderForm();
    }

    /**
     * Insert new Goalsandprinciples into database
     *
     * @param GoalsandprinciplesRequest $request
     * @return BaseHttpResponse
     */
    public function store(GoalsandprinciplesRequest $request, BaseHttpResponse $response)
    {
        $goalsandprinciples = $this->goalsandprinciplesRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(GOALSANDPRINCIPLES_MODULE_SCREEN_NAME, $request, $goalsandprinciples));

        return $response
            ->setPreviousUrl(route('goalsandprinciples.index'))
            ->setNextUrl(route('goalsandprinciples.edit', $goalsandprinciples->id))
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
        $goalsandprinciples = $this->goalsandprinciplesRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $goalsandprinciples));

        page_title()->setTitle(trans('plugins/goalsandprinciples::goalsandprinciples.edit') . ' "' . $goalsandprinciples->name . '"');

        return $formBuilder->create(GoalsandprinciplesForm::class, ['model' => $goalsandprinciples])->renderForm();
    }

    /**
     * @param $id
     * @param GoalsandprinciplesRequest $request
     * @return BaseHttpResponse
     */
    public function update($id, GoalsandprinciplesRequest $request, BaseHttpResponse $response)
    {
        $goalsandprinciples = $this->goalsandprinciplesRepository->findOrFail($id);

        $goalsandprinciples->fill($request->input());

        $this->goalsandprinciplesRepository->createOrUpdate($goalsandprinciples);

        event(new UpdatedContentEvent(GOALSANDPRINCIPLES_MODULE_SCREEN_NAME, $request, $goalsandprinciples));

        return $response
            ->setPreviousUrl(route('goalsandprinciples.index'))
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
            $goalsandprinciples = $this->goalsandprinciplesRepository->findOrFail($id);

            $this->goalsandprinciplesRepository->delete($goalsandprinciples);

            event(new DeletedContentEvent(GOALSANDPRINCIPLES_MODULE_SCREEN_NAME, $request, $goalsandprinciples));

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
            $goalsandprinciples = $this->goalsandprinciplesRepository->findOrFail($id);
            $this->goalsandprinciplesRepository->delete($goalsandprinciples);
            event(new DeletedContentEvent(GOALSANDPRINCIPLES_MODULE_SCREEN_NAME, $request, $goalsandprinciples));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
