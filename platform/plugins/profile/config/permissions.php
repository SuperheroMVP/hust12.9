<?php

return [
    [
        'name' => 'Profiles',
        'flag' => 'profile.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'profile.create',
        'parent_flag' => 'profile.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'profile.edit',
        'parent_flag' => 'profile.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'profile.destroy',
        'parent_flag' => 'profile.index',
    ],
];
