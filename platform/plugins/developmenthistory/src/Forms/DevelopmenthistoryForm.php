<?php

namespace Botble\Developmenthistory\Forms;

use Botble\Base\Forms\FormAbstract;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Developmenthistory\Http\Requests\DevelopmenthistoryRequest;
use Botble\Developmenthistory\Models\Developmenthistory;

class DevelopmenthistoryForm extends FormAbstract
{

    /**
     * @return mixed|void
     * @throws \Throwable
     */
    public function buildForm()
    {
        $this
            ->setModuleName(DEVELOPMENTHISTORY_MODULE_SCREEN_NAME)
            ->setupModel(new Developmenthistory)
            ->setValidatorClass(DevelopmenthistoryRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label' => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('date', 'text', [
                'label' => 'Mốc thời gian',
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'placeholder'  => 'vd: 2020',
                    'data-counter' => 120,
                ],
            ])
            ->add('order', 'number', [
                'label'         => trans('core/base::forms.order'),
                'label_attr'    => ['class' => 'control-label required'],
                'attr'          => [
                    'placeholder' => '',
                ],
                'default_value' => 0,
            ])
            ->add('video', 'text', [
                'label' => 'video',
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'placeholder'  => '',
                    'data-counter' => 500,
                ],
            ])
            ->add('content', 'text', [
                'label' => 'Nội dung',
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'placeholder'  => '',
                    'data-counter' => 500,
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
            ->setBreakFieldPoint('status');
    }
}
