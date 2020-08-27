<?php

namespace Botble\ACL\Forms;

use Botble\ACL\Http\Requests\UpdateProfileRequest;
use Botble\ACL\Models\User;
use Botble\Base\Forms\FormAbstract;

use Botble\ACL\Forms\Fields\CategoryMultiFieldCustomCheckbox;
use Botble\Blog\Repositories\Interfaces\CategoryInterface;

class ProfileForm extends FormAbstract
{
    /**
     * @return mixed|void
     * @throws \Throwable
     */
    public function buildForm()
    {


        $get_id_user= request()->segment(count(request()->segments()));
//        $selectedCategories_user = User::where('id', $get_id_user)->pluck('categories');
        $selectedCategories = [];
        if ($this->getModel()) {
            $selectedCategories = $this->getModel()->where('id', $get_id_user)->pluck('categories')->all();
        }
        $selectedCategories= $selectedCategories[0];
//        dd($selectedCategories);
        if (empty($selectedCategories)) {
            $selectedCategories = app(CategoryInterface::class)
                ->getModel()
                ->where('is_default', 1)
                ->pluck('id')
                ->all();
        }



        if (!$this->formHelper->hasCustomField('multiCheckbox')) {
            $this->formHelper->addCustomField('multiCheckbox', CategoryMultiFieldCustomCheckbox::class);
        }
        $this
            ->setModuleName(USER_MODULE_SCREEN_NAME)
            ->setupModel(new User)
            ->setFormOption('template', 'core/base::forms.form-no-wrap')
            ->setFormOption('id', 'profile-form')
            ->setFormOption('class', 'row')
            ->setValidatorClass(UpdateProfileRequest::class)
            ->withCustomFields()
            ->add('first_name', 'text', [
                'label'      => trans('core/acl::users.info.first_name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'data-counter' => 30,
                ],
                'wrapper'    => [
                    'class' => $this->formHelper->getConfig('defaults.wrapper_class') . ' col-md-6',
                ],
            ])
            ->add('last_name', 'text', [
                'label'      => trans('core/acl::users.info.last_name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'data-counter' => 30,
                ],
                'wrapper'    => [
                    'class' => $this->formHelper->getConfig('defaults.wrapper_class') . ' col-md-6',
                ],
            ])
            ->add('username', 'text', [
                'label'      => trans('core/acl::users.username'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'data-counter' => 30,
                ],
                'wrapper'    => [
                    'class' => $this->formHelper->getConfig('defaults.wrapper_class') . ' col-md-6',
                ],
            ])
            ->add('email', 'text', [
                'label'      => trans('core/acl::users.email'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => __('Ex: example@gmail.com'),
                    'data-counter' => 60,
                ],
                'wrapper'    => [
                    'class' => $this->formHelper->getConfig('defaults.wrapper_class') . ' col-md-6',
                ],
            ])
            ->add('categories[]', 'multiCheckbox', [
                'label'      => "Mục quản lý",
                'label_attr' => ['class' => 'control-label required'],
                'choices'    => get_categories_with_children(),
                'value'      => old('categories', $selectedCategories),
            ])
            ->setActionButtons(view('core/acl::users.profile.actions')->render());
    }

}
