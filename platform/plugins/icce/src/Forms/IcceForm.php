<?php

namespace Botble\Icce\Forms;

use Botble\Base\Forms\FormAbstract;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Icce\Http\Requests\IcceRequest;
use Botble\Icce\Models\Icce;

class IcceForm extends FormAbstract
{

    /**
     * @return mixed|void
     * @throws \Throwable
     */
    public function buildForm()
    {
        $this
            ->setModuleName(ICCE_MODULE_SCREEN_NAME)
            ->setupModel(new Icce)
            ->setValidatorClass(IcceRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label' => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('image1', 'mediaImage', [
                'label'      => 'Hình ảnh 1',
                'label_attr' => ['class' => 'control-label'],

            ])
            ->add('image2', 'mediaImage', [
                'label'      => 'Hình ảnh 2',
                'label_attr' => ['class' => 'control-label'],

            ])
            ->add('image3', 'mediaImage', [
                'label'      => 'Hình ảnh 3',
                'label_attr' => ['class' => 'control-label'],

            ])
            ->add('image4', 'mediaImage', [
                'label'      => 'Hình ảnh 4',
                'label_attr' => ['class' => 'control-label'],

            ])
            ->add('image5', 'mediaImage', [
                'label'      => 'Hình ảnh 5',
                'label_attr' => ['class' => 'control-label'],

            ])
            ->add('image6', 'mediaImage', [
                'label'      => 'Hình ảnh 6',
                'label_attr' => ['class' => 'control-label'],

            ])
            ->add('image7', 'mediaImage', [
                'label'      => 'Hình ảnh 7',
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
