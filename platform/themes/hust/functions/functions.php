<?php

require_once __DIR__ . '/../vendor/autoload.php';

register_page_template([
    'default' => 'Default'
]);

register_sidebar([
    'id' => 'second_sidebar',
    'name' => 'Second sidebar',
    'description' => 'This is a sample sidebar for hust theme',
]);

theme_option()
    ->setArgs(['debug' => config('app.debug')])
    ->setSection([
        'title'      => __('General'),
        'desc'       => __('General settings'),
        'id'         => 'opt-text-subsection-general',
        'subsection' => true,
        'icon'       => 'fa fa-home',
    ])
    ->setSection([
        'title'      => __('Logo'),
        'desc'       => __('Change logo'),
        'id'         => 'opt-text-subsection-logo',
        'subsection' => true,
        'icon'       => 'fa fa-image',
        'fields'     => [
            [
                'id'         => 'logo',
                'type'       => 'mediaImage',
                'label'      => __('Logo'),
                'attributes' => [
                    'name'  => 'logo',
                    'value' => null,
                ],
            ],
        ],
    ])
    ->setSection([
        'title'      => __('Logo'),
        'desc'       => __('Change Favicon'),
        'id'         => 'opt-text-subsection-logo',
        'subsection' => true,
        'icon'       => 'fa fa-image',
        'fields'     => [
            [
                'id'         => 'favicon',
                'type'       => 'mediaImage',
                'label'      => __('Favicon'),
                'attributes' => [
                    'name'  => 'favicon',
                    'value' => null,
                ],
            ],
        ],
    ])
    ->setField([
        'id'         => 'phone',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => __('Số điện thoại'),
        'attributes' => [
            'name'    => 'phone',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 25,
            ],
        ],
    ])
    ->setField([
        'id'         => 'fax',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => __('Số fax'),
        'attributes' => [
            'name'    => 'fax',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 25,
            ],
        ],
    ])
    ->setField([
        'id'         => 'email',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'email',
        'label'      => __('Email'),
        'attributes' => [
            'name'    => 'email',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 255,
            ],
        ],
    ])
    ->setField([
        'id'         => 'address',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => __('Địa chỉ'),
        'attributes' => [
            'name'    => 'address',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 255,
            ],
        ],
    ])
    ->setField([
        'id'         => 'ctdt',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'number',
        'label'      => __('Chương trình đào tạo'),
        'attributes' => [
            'name'    => 'ctdt',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 120,
            ],
        ],
    ])
    ->setField([
        'id'         => 'sinhvien',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'number',
        'label'      => __('Sinh viên'),
        'attributes' => [
            'name'    => 'sinhvien',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 120,
            ],
        ],
    ])
    ->setField([
        'id'         => 'ctkh',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'number',
        'label'      => __('Chương trình khoa học'),
        'attributes' => [
            'name'    => 'ctkh',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 120,
            ],
        ],
    ])
    ->setField([
        'id'         => 'doitac',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'number',
        'label'      => __('Đối tác'),
        'attributes' => [
            'name'    => 'doitac',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 120,
            ],
        ],
    ])
    ->setField([
        'id'         => 'copyright',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => __('Copyright'),
        'attributes' => [
            'name'    => 'copyright',
            'value'   => '© 2020 HTC DEV. All right reserved.',
            'options' => [
                'class'        => 'form-control',
                'placeholder'  => __('Change copyright'),
                'data-counter' => 250,
            ]
        ],
        'helper' => __('Copyright on footer of site'),
    ]);
