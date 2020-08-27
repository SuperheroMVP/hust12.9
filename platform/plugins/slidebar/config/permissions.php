<?php

return [
    [
        'name' => 'Slidebars',
        'flag' => 'slidebar.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'slidebar.create',
        'parent_flag' => 'slidebar.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'slidebar.edit',
        'parent_flag' => 'slidebar.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'slidebar.destroy',
        'parent_flag' => 'slidebar.index',
    ],
];
