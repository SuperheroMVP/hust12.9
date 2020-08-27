<?php

namespace Botble\Developmenthistory\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class Developmenthistory extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'developmenthistories';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        'video',
        'content',
        'order',
        'date',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];
}
