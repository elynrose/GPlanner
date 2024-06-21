<?php

namespace App\Http\Requests;

use App\Models\Draft;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDraftRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('draft_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:drafts,id',
        ];
    }
}
