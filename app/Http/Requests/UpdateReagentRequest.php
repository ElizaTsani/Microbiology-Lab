<?php

namespace App\Http\Requests;

use App\Models\Reagent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReagentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reagent_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'code' => [
                'string',
                'required',
                'unique:reagents,code,' . request()->route('reagent')->id,
            ],
            'available_stock' => [
                'string',
                'required',
            ],
            'minimum_reserve' => [
                'string',
                'required',
            ],
        ];
    }
}
