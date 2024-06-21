<?php

namespace App\Http\Requests;

use App\Models\Task;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTaskRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('task_edit');
    }

    public function rules()
    {
        return [
            'unique_code' => [
                'string',
                'required',
                'unique:tasks,unique_code,' . request()->route('task')->id,
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
