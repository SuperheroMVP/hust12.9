<?php

namespace Botble\Page\Forms;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Forms\FormAbstract;
use Botble\Page\Http\Requests\PageRequest;
use Botble\Page\Models\Page;
use Throwable;

class PageForm extends FormAbstract
{

    /**
     * @var string
     */
    protected $template = 'core/base::forms.form-tabs';

    /**
     * @return mixed|void
     * @throws Throwable
     */
    public function buildForm()
    {

        $templates = [
            'default' => 'Default',
            'gioithieu' => 'Giới thiệu',
            'cocautochuc' => 'Cơ cấu tổ chức',
            'daotao' => 'Đào tạo',
            'lienhe' => 'Liên hệ',
//            'bomontrungtam' => 'Bộ môn & Trung tâm',
            'nghiencuu' => 'Nghiên cứu',
            'connguoi' => 'Con người',
            'subconnguoi' => 'Danh mục con người',
            'conso' => 'Con số',
            'sub_dao_tao'=>'Sub Đào Tao',
            'phong_thi_nghiem'=>'Phòng Thí Nghiệm',
            'sinh_vien_tuong_lai'=>'Sinh Vin Tương Lai',
            'sinh_vien_hien_tai'=>'Sinh Viên Hiện Tại',
            'under_construction'=>'Đang Xây Dựng',
        ];
        $this
            ->setModuleName(PAGE_MODULE_SCREEN_NAME)
            ->setupModel(new Page)
            ->setValidatorClass(PageRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label' => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('description', 'textarea', [
                'label' => trans('core/base::forms.description'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'rows' => 4,
                    'placeholder' => trans('core/base::forms.description_placeholder'),
                    'data-counter' => 1000,
                ],
            ])
            ->add('content', 'editor', [
                'label' => trans('core/base::forms.content'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => trans('core/base::forms.description_placeholder'),
                    'with-short-code' => true,
                ],
            ])
            ->add('is_featured', 'onOff', [
                'label' => trans('core/base::forms.is_featured'),
                'label_attr' => ['class' => 'control-label'],
                'default_value' => false,
            ])
            ->add('status', 'customSelect', [
                'label' => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => BaseStatusEnum::labels(),
            ])
            ->add('template', 'customSelect', [
                'label' => trans('core/base::forms.template'),
                'label_attr' => ['class' => 'control-label required '],
                'choices' => get_page_templates(),
            ])
            ->add('temp_view', 'customSelect', [
                'label' => 'Template view',
                'label_attr' => ['class' => 'control-label required'],
                'choices' => $templates,
            ])
            ->add('image', 'mediaImage', [
                'label' => trans('core/base::forms.image'),
                'label_attr' => ['class' => 'control-label'],
            ])
            ->add('video', 'text', [
                'label' => 'Video',
                'label_attr' => ['class' => 'control-label'],
            ])
            ->setBreakFieldPoint('status');
    }
}
