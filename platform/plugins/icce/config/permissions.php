<?php

return [
    [
        'name' => 'Icces',
        'flag' => 'icce.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'icce.create',
        'parent_flag' => 'icce.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'icce.edit',
        'parent_flag' => 'icce.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'icce.destroy',
        'parent_flag' => 'icce.index',
    ],
];
