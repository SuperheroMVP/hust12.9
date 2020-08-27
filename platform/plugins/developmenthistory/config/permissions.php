<?php

return [
    [
        'name' => 'Developmenthistories',
        'flag' => 'developmenthistory.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'developmenthistory.create',
        'parent_flag' => 'developmenthistory.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'developmenthistory.edit',
        'parent_flag' => 'developmenthistory.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'developmenthistory.destroy',
        'parent_flag' => 'developmenthistory.index',
    ],
];
