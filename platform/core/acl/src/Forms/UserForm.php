<?php

namespace Botble\ACL\Forms;

use Botble\ACL\Http\Requests\CreateUserRequest;
use Botble\ACL\Models\User;
use Botble\ACL\Repositories\Interfaces\RoleInterface;
use Botble\Base\Forms\FormAbstract;
//use Botble\Profile\Forms\ProfileForm;
//use Botble\Blog\Models\Category;
use Botble\ACL\Forms\Fields\CategoryMultiFieldCustomCheckbox;
//use Assets;
//use Botble\Base\Enums\BaseStatusEnum;
//use Botble\Blog\Http\Requests\PostRequest;
//use Botble\Blog\Models\Post;
//use Botble\Blog\Repositories\Interfaces\CategoryInterface;

class UserForm extends FormAbstract
{
    /**
     * @var RoleInterface
     */
    protected $roleRepository;
    protected $template = 'core/base::forms.form-tabs';

    /**
     * UserForm constructor.
     * @param RoleInterface $roleRepository
     * @throws \Throwable
     */
    public function __construct(RoleInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
        parent::__construct();
    }

    /**
     * @return mixed|void
     * @throws \Throwable
     */
    public function buildForm()
    {
        $roles = $this->roleRepository->pluck('name', 'id');

        $selectedCategories = [];
//        if ($this->getModel()) {
//            $selectedCategories = $this->getModel()->categories()->pluck('category_id')->all();
//        }
//
//        if (empty($selectedCategories)) {
//            $selectedCategories = app(CategoryInterface::class)
//                ->getModel()
//                ->where('is_default', 1)
//                ->pluck('id')
//                ->all();
//        }
        if (!$this->formHelper->hasCustomField('multiCheckbox')) {
            $this->formHelper->addCustomField('multiCheckbox', CategoryMultiFieldCustomCheckbox::class);
        }

        $this
            ->setModuleName(USER_MODULE_SCREEN_NAME)
            ->setupModel(new User)
            ->setValidatorClass(CreateUserRequest::class)
            ->setWrapperClass('form-body row')
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
            ->add('password', 'password', [
                'label'      => trans('core/acl::users.password'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'data-counter' => 60,
                ],
                'wrapper'    => [
                    'class' => $this->formHelper->getConfig('defaults.wrapper_class') . ' col-md-6',
                ],
            ])
            ->add('password_confirmation', 'password', [
                'label'      => __('Re-type password'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'data-counter' => 60,
                ],
                'wrapper'    => [
                    'class' => $this->formHelper->getConfig('defaults.wrapper_class') . ' col-md-6',
                ],
            ])
            ->add('role_id', 'customSelect', [
                'label'      => trans('core/acl::users.role'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'class' => 'form-control roles-list',
                ],
                'choices'    => ['' => __('Select role')] + $roles,
                'wrapper'    => [
                    'class' => $this->formHelper->getConfig('defaults.wrapper_class') . ' col-md-6',
                ],
            ])
            ->add('categories[]', 'multiCheckbox', [
                'label'      => "Mục quản lý",
                'label_attr' => ['class' => 'control-label required'],
                'choices'    => get_categories_with_children(),
                'value'      => old('categories', $selectedCategories),
            ]);
    }
}
