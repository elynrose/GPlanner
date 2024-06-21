<?php

namespace App\Http\Requests;

use App\Models\Reminder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReminderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reminder_edit');
    }

    public function rules()
    {
        return [
            'event' => [
                'string',
                'required',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'time' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
