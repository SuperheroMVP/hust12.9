<?php

namespace Botble\Goalsandprinciples\Forms;

use Botble\Base\Forms\FormAbstract;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Goalsandprinciples\Http\Requests\GoalsandprinciplesRequest;
use Botble\Goalsandprinciples\Models\Goalsandprinciples;

class GoalsandprinciplesForm extends FormAbstract
{

    /**
     * @return mixed|void
     * @throws \Throwable
     */
    public function buildForm()
    {
        $this
            ->setModuleName(GOALSANDPRINCIPLES_MODULE_SCREEN_NAME)
            ->setupModel(new Goalsandprinciples)
            ->setValidatorClass(GoalsandprinciplesRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label' => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('discription', 'text', [
                'label' => 'Mô tả',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
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
            ->add('sub', 'number', [
                            'label'         => 'Thứ tự',
                            'label_attr'    => ['class' => 'control-label'],
                            'attr'          => [
                                'placeholder' => trans('core/base::forms.order_by_placeholder'),
                            ],
                            'default_value' => 0,
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
