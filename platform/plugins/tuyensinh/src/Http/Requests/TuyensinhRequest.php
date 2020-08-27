<?php

namespace Botble\Tuyensinh\Http\Requests;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class TuyensinhRequest extends Request
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
            'content'   => 'required',
            'loai'   => 'required',
            'status' => Rule::in(BaseStatusEnum::values()),
        ];
    }
}
