<?php

namespace App\Http\Requests;

use App\Models\Draft;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDraftRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('draft_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'content' => [
                'required',
            ],
            'task_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
