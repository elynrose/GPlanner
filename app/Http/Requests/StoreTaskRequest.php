<?php

namespace App\Http\Requests;

use App\Models\Task;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTaskRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('task_create');
    }

    public function rules()
    {
        return [
            'unique_code' => [
                'string',
                'required',
                'unique:tasks',
            ],
            'title' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
            'due_date' => [
                'string',
                'nullable',
            ],
            'call_to_action' => [
                'string',
                'nullable',
            ],
        ];
    }
}
