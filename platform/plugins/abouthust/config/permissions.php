<?php

return [
    [
        'name' => 'Abouthust',
        'flag' => 'abouthust.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'abouthust.create',
        'parent_flag' => 'abouthust.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'abouthust.edit',
        'parent_flag' => 'abouthust.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'abouthust.destroy',
        'parent_flag' => 'abouthust.index',
    ],
];
