<?php

namespace App\Http\Requests;

use App\Models\Mod;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateModRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mod_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
