<?php

return [
    [
        'name' => 'Reasonhust',
        'flag' => 'reasonhust.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'reasonhust.create',
        'parent_flag' => 'reasonhust.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'reasonhust.edit',
        'parent_flag' => 'reasonhust.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'reasonhust.destroy',
        'parent_flag' => 'reasonhust.index',
    ],
];
