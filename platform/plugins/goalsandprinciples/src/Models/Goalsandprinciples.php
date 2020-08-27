<?php

namespace Botble\Goalsandprinciples\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class Goalsandprinciples extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'goalsandprinciples';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
        'content',
        'discription',
        'sub',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];
}
