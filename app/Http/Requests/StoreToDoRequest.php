<?php

namespace App\Http\Requests;

use App\Models\ToDo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreToDoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('to_do_create');
    }

    public function rules()
    {
        return [
            'item' => [
                'string',
                'nullable',
            ],
            'due_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
