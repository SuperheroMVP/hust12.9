<?php

namespace Botble\Icce\Http\Controllers;

use Botble\Assets\Assets;
use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Icce\Http\Requests\IcceRequest;
use Botble\Icce\Repositories\Interfaces\IcceInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Icce\Tables\IcceTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Icce\Forms\IcceForm;
use Botble\Base\Forms\FormBuilder;

class IcceController extends BaseController
{
    /**
     * @var IcceInterface
     */
    protected $icceRepository;

    /**
     * IcceController constructor.
     * @param IcceInterface $icceRepository
     */
    public function __construct(IcceInterface $icceRepository)
    {
        $this->icceRepository = $icceRepository;
    }

    /**
     * Display all icces
     * @param IcceTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(IcceTable $table)
    {

        page_title()->setTitle(trans('plugins/icce::icce.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/icce::icce.create'));

        return $formBuilder->create(IcceForm::class)->renderForm();
    }

    /**
     * Insert new Icce into database
     *
     * @param IcceRequest $request
     * @return BaseHttpResponse
     */
    public function store(IcceRequest $request, BaseHttpResponse $response)
    {
        $icce = $this->icceRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(ICCE_MODULE_SCREEN_NAME, $request, $icce));

        return $response
            ->setPreviousUrl(route('icce.index'))
            ->setNextUrl(route('icce.edit', $icce->id))
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
        $icce = $this->icceRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $icce));

        page_title()->setTitle(trans('plugins/icce::icce.edit') . ' "' . $icce->name . '"');

        return $formBuilder->create(IcceForm::class, ['model' => $icce])->renderForm();
    }

    /**
     * @param $id
     * @param IcceRequest $request
     * @return BaseHttpResponse
     */
    public function update($id, IcceRequest $request, BaseHttpResponse $response)
    {
        $icce = $this->icceRepository->findOrFail($id);

        $icce->fill($request->input());

        $this->icceRepository->createOrUpdate($icce);

        event(new UpdatedContentEvent(ICCE_MODULE_SCREEN_NAME, $request, $icce));

        return $response
            ->setPreviousUrl(route('icce.index'))
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
            $icce = $this->icceRepository->findOrFail($id);

            $this->icceRepository->delete($icce);

            event(new DeletedContentEvent(ICCE_MODULE_SCREEN_NAME, $request, $icce));

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
            $icce = $this->icceRepository->findOrFail($id);
            $this->icceRepository->delete($icce);
            event(new DeletedContentEvent(ICCE_MODULE_SCREEN_NAME, $request, $icce));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
