<?php

namespace Botble\Profile\Forms;

use Botble\Base\Forms\FormAbstract;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Profile\Http\Requests\ProfileRequest;

use Botble\Profile\Models\Profile;
use App\User;
use Botble\Blog\Models\Category;
use Botble\Blog\Models\Post;
use Illuminate\Support\Facades\DB;

class ProfileForm extends FormAbstract
{
    /**
     * @return mixed|void
     * @throws \Throwable
     */
    public function buildForm()
    {
            $this
                ->setModuleName(PROFILE_MODULE_SCREEN_NAME)
                ->setupModel(new Profile)
                ->setValidatorClass(ProfileRequest::class)
                ->withCustomFields()
                ->add('name', 'text', [
                    'label' => trans('core/base::forms.name'),
                    'label_attr' => ['class' => 'control-label required'],
                    'attr' => [
                        'placeholder'  => trans('core/base::forms.name_placeholder'),
                        'data-counter' => 120,
                    ],
                ])
                ->add('diachi', 'text', [
                    'label' => 'Địa chỉ',
                    'label_attr' => ['class' => 'control-label required'],
                    'attr' => [
                        'placeholder'  => trans('core/base::forms.name_placeholder'),
                        'data-counter' => 255,
                    ],
                ])

                ->add('description', 'textarea', [
                    'label'      => trans('core/base::forms.description'),
                    'label_attr' => ['class' => 'control-label'],
                    'attr'       => [
                        'rows'         => 4,
                        'placeholder'  => trans('core/base::forms.description_placeholder'),
                        'data-counter' => 400,
                    ],
                ])
                ->add('content', 'editor', [
                    'label'      => trans('core/base::forms.content'),
                    'label_attr' => ['class' => 'control-label'],
                    'attr'       => [
                        'rows'            => 4,
                        'placeholder'     => trans('core/base::forms.description_placeholder'),
                        'with-short-code' => true,
                    ],
                ])
                ->add('image', 'mediaImage', [
                    'label'      => trans('core/base::forms.image'),
                    'label_attr' => ['class' => 'control-label'],
                ])
                ->add('status', 'customSelect', [
                    'label'      => trans('core/base::tables.status'),
                    'label_attr' => ['class' => 'control-label required'],
                    'attr' => [
                        'class' => 'form-control select-full',
                    ],
                    'choices'    => BaseStatusEnum::labels(),
                ])
                ->add('khoa_id', 'customSelect', [
                    'label'      => "Khoa",
                    'label_attr' => ['class' => 'control-label required'],
                    'attr' => [
                        'class' => 'form-control select-full',
                    ],
                    'choices'    => ProfileForm::get_khoa(),
                ])
                ->add('chucvu', 'text', [
                    'label'      => "Chức vụ",
                    'label_attr' => ['class' => 'control-label'],
                ])
                ->add('loai', 'customSelect', [
                    'label'      => 'Nhân sự',
                    'label_attr' => ['class' => 'control-label required'],
                    'attr' => [
                        'class' => 'form-control select-full',
                    ],
                    'choices'    => [
                        'default' => 'Mặc định',
                        'quanly' => 'Quản lý',
                        'giangday' => 'Giảng dạy',
                        'postdoc' => 'Postdoc',
                    ],
                ])
                ->add('email', 'text', [
                    'label'      => "Email",
                    'label_attr' => ['class' => 'control-label'],
                ])
                ->add('sdt', 'text', [
                    'label'      => "Số điện thoại",
                    'label_attr' => ['class' => 'control-label'],
                ])
                ->add('facebook', 'text', [
                    'label'      => "Facebook",
                    'label_attr' => ['class' => 'control-label'],
                ])
                ->add('zalo', 'text', [
                    'label'      => "Zalo",
                    'label_attr' => ['class' => 'control-label'],
                ])
                ->add('instagram', 'text', [
                    'label'      => "Instagram",
                    'label_attr' => ['class' => 'control-label'],
                ])
                ->setBreakFieldPoint('status');

            if (auth()->user()->super_user == 1) {
                $this
                    ->setModuleName(PROFILE_MODULE_SCREEN_NAME)
                    ->setupModel(new Profile)
                    ->setValidatorClass(ProfileRequest::class)
                    ->withCustomFields()
                    ->add('author_id', 'customSelect', [
                    'label' => "Tài khoản",
                    'label_attr' => ['class' => 'control-label required'],
                    'attr' => [
                        'class' => 'form-control select-full',
                    ],
                    'choices' => ProfileForm::get_IdUser(),
                ]);
            }
    }

    public function get_IdUser(){
        $id = [];
        foreach (User::select('id', 'username')->get() as $key){
            $id[$key->id]= $key->username;
        }
        return $id;
    }
    public function get_khoa(){
        foreach (Category::where("categories_check", "so_do_to_chuc")->pluck('id') as $id_cate){
            $id_postCategori = $id_cate;
        }
        foreach ( Category::where("parent_id", $id_postCategori)->get() as $key){
            $id[$key->id] = $key->name;
        }
        return $id;
    }
}
