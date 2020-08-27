<?php

return [
    [
        'name' => 'Goalsandprinciples',
        'flag' => 'goalsandprinciples.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'goalsandprinciples.create',
        'parent_flag' => 'goalsandprinciples.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'goalsandprinciples.edit',
        'parent_flag' => 'goalsandprinciples.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'goalsandprinciples.destroy',
        'parent_flag' => 'goalsandprinciples.index',
    ],
];
