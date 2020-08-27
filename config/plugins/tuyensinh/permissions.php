<?php

return [
    [
        'name' => 'Tuyensinhs',
        'flag' => 'tuyensinh.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'tuyensinh.create',
        'parent_flag' => 'tuyensinh.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'tuyensinh.edit',
        'parent_flag' => 'tuyensinh.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'tuyensinh.destroy',
        'parent_flag' => 'tuyensinh.index',
    ],
];
