<?php

require_once __DIR__ . '/../vendor/autoload.php';

register_page_template([
    'default' => 'Default'
]);

register_sidebar([
    'id' => 'second_sidebar',
    'name' => 'Second sidebar',
    'description' => 'This is a sample sidebar for press theme',
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
        'title'      => __('Logo Thumb'),
        'desc'       => __('Logo Thumb'),
        'id'         => 'opt-text-subsection-logo',
        'subsection' => true,
        'icon'       => 'fa fa-image',
        'fields'     => [
            [
                'id'         => 'logo_thumb',
                'type'       => 'mediaImage',
                'label'      => __('Logo Thumb'),
                'attributes' => [
                    'name'  => 'logo_thumb',
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
        'id'         => 'facebook',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => __('Facebook'),
        'attributes' => [
            'name'    => 'facebook',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 255,
            ],
        ],
    ])
    ->setField([
        'id'         => 'youtube',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => __('Youtube'),
        'attributes' => [
            'name'    => 'youtube',
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
        'id'         => 'top_vn',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'number',
        'label'      => __('Top Việt Nam'),
        'attributes' => [
            'name'    => 'top_vn',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 120,
            ],
        ],
    ])
    ->setField([
        'id'         => 'nam_kinh_nghiem',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'number',
        'label'      => __('Số năm kinh nghiệm'),
        'attributes' => [
            'name'    => 'nam_kinh_nghiem',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 120,
            ],
        ],
    ])
    ->setField([
        'id'         => 'truong_doi_tac',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'number',
        'label'      => __('Trường đối tác'),
        'attributes' => [
            'name'    => 'truong_doi_tac',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 120,
            ],
        ],
    ])
    ->setField([
        'id'         => 'doanh_nghiep_doi_tac',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'number',
        'label'      => __('Doanh nghiệp đối tác'),
        'attributes' => [
            'name'    => 'doanh_nghiep_doi_tac',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 120,
            ],
        ],
    ])

    ->setField([
        'id'         => 'phong_tnth',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'number',
        'label'      => __('Phòng thí nghiệm thực hành'),
        'attributes' => [
            'name'    => 'phong_tnth',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 120,
            ],
        ],
    ])

    ->setField([
        'id'         => 'phong_tnnc',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'number',
        'label'      => __('Phòng thí nghiệm nghiên cứu'),
        'attributes' => [
            'name'    => 'phong_tnnc',
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
            'value'   => '© 2019 Botble Technologies. All right reserved.',
            'options' => [
                'class'        => 'form-control',
                'placeholder'  => __('Change copyright'),
                'data-counter' => 250,
            ]
        ],
        'helper' => __('Copyright on footer of site'),
    ]);
