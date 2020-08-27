<?php

namespace Botble\Profile\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use \Botble\Slug\Traits\SlugTrait;

class Profile extends BaseModel
{
    use EnumCastable, SlugTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'profiles';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'diachi',
        'description',
        'content',
        'image',
        'author_id',
        'khoa_id',
        'chucvu',
        'loai',
        'email',
        'sdt',
        'facebook',
        'zalo',
        'instagram',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

}
