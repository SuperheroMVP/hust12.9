<?php

namespace Botble\Tuyensinh\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Tuyensinh\Http\Requests\TuyensinhRequest;
use Botble\Tuyensinh\Repositories\Interfaces\TuyensinhInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Tuyensinh\Tables\TuyensinhTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Tuyensinh\Forms\TuyensinhForm;
use Botble\Base\Forms\FormBuilder;

class TuyensinhController extends BaseController
{
    /**
     * @var TuyensinhInterface
     */
    protected $tuyensinhRepository;

    /**
     * TuyensinhController constructor.
     * @param TuyensinhInterface $tuyensinhRepository
     */
    public function __construct(TuyensinhInterface $tuyensinhRepository)
    {
        $this->tuyensinhRepository = $tuyensinhRepository;
    }

    /**
     * Display all tuyensinhs
     * @param TuyensinhTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(TuyensinhTable $table)
    {

        page_title()->setTitle(trans('plugins/tuyensinh::tuyensinh.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/tuyensinh::tuyensinh.create'));

        return $formBuilder->create(TuyensinhForm::class)->renderForm();
    }

    /**
     * Insert new Tuyensinh into database
     *
     * @param TuyensinhRequest $request
     * @return BaseHttpResponse
     */
    public function store(TuyensinhRequest $request, BaseHttpResponse $response)
    {
        $tuyensinh = $this->tuyensinhRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(TUYENSINH_MODULE_SCREEN_NAME, $request, $tuyensinh));

        return $response
            ->setPreviousUrl(route('tuyensinh.index'))
            ->setNextUrl(route('tuyensinh.edit', $tuyensinh->id))
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
        $tuyensinh = $this->tuyensinhRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $tuyensinh));

        page_title()->setTitle(trans('plugins/tuyensinh::tuyensinh.edit') . ' "' . $tuyensinh->name . '"');

        return $formBuilder->create(TuyensinhForm::class, ['model' => $tuyensinh])->renderForm();
    }

    /**
     * @param $id
     * @param TuyensinhRequest $request
     * @return BaseHttpResponse
     */
    public function update($id, TuyensinhRequest $request, BaseHttpResponse $response)
    {
        $tuyensinh = $this->tuyensinhRepository->findOrFail($id);

        $tuyensinh->fill($request->input());

        $this->tuyensinhRepository->createOrUpdate($tuyensinh);

        event(new UpdatedContentEvent(TUYENSINH_MODULE_SCREEN_NAME, $request, $tuyensinh));

        return $response
            ->setPreviousUrl(route('tuyensinh.index'))
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
            $tuyensinh = $this->tuyensinhRepository->findOrFail($id);

            $this->tuyensinhRepository->delete($tuyensinh);

            event(new DeletedContentEvent(TUYENSINH_MODULE_SCREEN_NAME, $request, $tuyensinh));

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
            $tuyensinh = $this->tuyensinhRepository->findOrFail($id);
            $this->tuyensinhRepository->delete($tuyensinh);
            event(new DeletedContentEvent(TUYENSINH_MODULE_SCREEN_NAME, $request, $tuyensinh));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
