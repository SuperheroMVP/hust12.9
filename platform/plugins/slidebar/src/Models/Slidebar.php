<?php

namespace Botble\Slidebar\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class Slidebar extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'slidebars';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        'loai',
        'status',
        'sort',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];
}
