<?php

namespace Botble\Slidebar\Forms;

use Botble\Base\Forms\FormAbstract;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Slidebar\Http\Requests\SlidebarRequest;
use Botble\Slidebar\Models\Slidebar;

class SlidebarForm extends FormAbstract
{

    /**
     * @return mixed|void
     * @throws \Throwable
     */
    public function buildForm()
    {
        $this
            ->setModuleName(SLIDEBAR_MODULE_SCREEN_NAME)
            ->setupModel(new Slidebar)
            ->setValidatorClass(SlidebarRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label' => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('image', 'mediaImage', [
                'label'      => trans('core/base::forms.image'),
                'label_attr' => ['class' => 'control-label'],
            ])
            ->add('loai', 'customSelect', [
                'label'      => 'Loại',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => [
                    'banner' => 'Banner',
                    'slide' => 'Slide',
                    'tuyen_sinh' => 'Tuyển sinh ',

                ],
            ])
            ->add('status', 'customSelect', [
                'label'      => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => BaseStatusEnum::labels(),
            ])
            ->add('sort', 'number', [
                'label'         => trans('core/base::forms.sort'),
                'label_attr'    => ['class' => 'control-label'],
                'default_value' => false,
            ])
            ->setBreakFieldPoint('status');
    }
}
