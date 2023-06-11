<?php

namespace App\Http\Requests;

use App\Models\Reagent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReagentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reagent_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:reagents,id',
        ];
    }
}
