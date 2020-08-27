<?php

namespace Botble\Profile\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Profile\Http\Requests\ProfileRequest;
use Botble\Profile\Repositories\Interfaces\ProfileInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Profile\Tables\ProfileTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Profile\Forms\ProfileForm;
use Botble\Base\Forms\FormBuilder;

class ProfileController extends BaseController
{
    /**
     * @var ProfileInterface
     */
    protected $profileRepository;

    /**
     * ProfileController constructor.
     * @param ProfileInterface $profileRepository
     */
    public function __construct(ProfileInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    /**
     * Display all profiles
     * @param ProfileTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(ProfileTable $table)
    {

        page_title()->setTitle(trans('plugins/profile::profile.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/profile::profile.create'));

        return $formBuilder->create(ProfileForm::class)->renderForm();
    }

    /**
     * Insert new Profile into database
     *
     * @param ProfileRequest $request
     * @return BaseHttpResponse
     */
    public function store(ProfileRequest $request, BaseHttpResponse $response)
    {
        $profile = $this->profileRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(PROFILE_MODULE_SCREEN_NAME, $request, $profile));

        return $response
            ->setPreviousUrl(route('profile.index'))
            ->setNextUrl(route('profile.edit', $profile->id))
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
        $profile = $this->profileRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $profile));

        page_title()->setTitle(trans('plugins/profile::profile.edit') . ' "' . $profile->name . '"');

        return $formBuilder->create(ProfileForm::class, ['model' => $profile])->renderForm();
    }

    /**
     * @param $id
     * @param ProfileRequest $request
     * @return BaseHttpResponse
     */
    public function update($id, ProfileRequest $request, BaseHttpResponse $response)
    {
        $profile = $this->profileRepository->findOrFail($id);

        $profile->fill($request->input());

        $this->profileRepository->createOrUpdate($profile);

        event(new UpdatedContentEvent(PROFILE_MODULE_SCREEN_NAME, $request, $profile));

        return $response
            ->setPreviousUrl(route('profile.index'))
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
            $profile = $this->profileRepository->findOrFail($id);

            $this->profileRepository->delete($profile);

            event(new DeletedContentEvent(PROFILE_MODULE_SCREEN_NAME, $request, $profile));

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
            $profile = $this->profileRepository->findOrFail($id);
            $this->profileRepository->delete($profile);
            event(new DeletedContentEvent(PROFILE_MODULE_SCREEN_NAME, $request, $profile));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
