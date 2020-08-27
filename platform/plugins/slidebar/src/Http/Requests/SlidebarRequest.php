<?php

namespace Botble\Slidebar\Http\Requests;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class SlidebarRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'   => 'required',
            'image'   => 'required',
            'status' => Rule::in(BaseStatusEnum::values()),
        ];
    }
}
