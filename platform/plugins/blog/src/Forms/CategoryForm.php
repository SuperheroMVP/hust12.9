<?php

namespace Botble\Blog\Forms;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Forms\FormAbstract;
use Botble\Blog\Http\Requests\CategoryRequest;
use Botble\Blog\Models\Category;

class CategoryForm extends FormAbstract
{

    /**
     * @return mixed|void
     * @throws \Throwable
     */
    public function buildForm()
    {
        $list = get_categories();

        $categories = [];
        foreach ($list as $row) {
            if ($this->getModel() && $this->model->id === $row->id) {
                continue;
            }

            $categories[$row->id] = $row->indent_text . ' ' . $row->name;
        }
        $categories = [0 => trans('plugins/blog::categories.none')] + $categories;

        $this
            ->setModuleName(CATEGORY_MODULE_SCREEN_NAME)
            ->setupModel(new Category)
            ->setValidatorClass(CategoryRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label'      => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('parent_id', 'select', [
                'label'      => trans('core/base::forms.parent'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'class' => 'select-search-full',
                ],
                'choices'    => $categories,
            ])
            ->add('description', 'textarea', [
                'label'      => trans('core/base::forms.description'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'rows'         => 4,
                    'placeholder'  => trans('core/base::forms.description_placeholder'),
                    'data-counter' => 5000,
                ],
            ])
            ->add('icon', 'text', [
                'label'      => trans('core/base::forms.icon'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'placeholder'  => 'Ex: fa fa-home',
                    'data-counter' => 60,
                ],
            ])
            ->add('order', 'number', [
                'label'         => trans('core/base::forms.order'),
                'label_attr'    => ['class' => 'control-label'],
                'attr'          => [
                    'placeholder' => trans('core/base::forms.order_by_placeholder'),
                ],
                'default_value' => 0,
            ])
            ->add('is_featured', 'onOff', [
                'label'         => trans('core/base::forms.is_featured'),
                'label_attr'    => ['class' => 'control-label'],
                'default_value' => false,
            ])
            ->add('status', 'customSelect', [
                'label'      => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'choices'    => BaseStatusEnum::labels(),
            ])
            ->add('image', 'mediaImage', [
                'label'      => trans('core/base::forms.image'),
                'label_attr' => ['class' => 'control-label'],
            ])
            ->add('danhmuc', 'customSelect', [
                'label'      => 'Template',
                'label_attr' => ['class' => 'control-label'],
                'choices'    => [
                    'default' => 'Mặc định',
                    'gioithieu' => 'Giới thiệu',
                    'daotao' => 'Đào tạo',
                    'nghiencuu' => 'Nghiên cứu',
                    'mucnghiencuu' => 'Mục nghiên cứu',
                    'tintuc' => 'Tin tức',
                    'btandtt' => 'Bộ môn và trung tâm',
                    'lab' => 'Centers&Labs',
                    'icce' => 'Hôi thảo ICCE',
                    'conso' => 'Con số ',
                    'tintuc_daotao'=>'Tin tức đào tạo',
                    'danhmuc_daotao'=>'Danh mục đào tạo',
                    'cơ_cau_to_chuc'=>'Cơ cấu tổ chức',
                    'tuyen_sinh'=>'Tuyển Sinh',
                ],
            ])
            ->setBreakFieldPoint('status');
    }
}
