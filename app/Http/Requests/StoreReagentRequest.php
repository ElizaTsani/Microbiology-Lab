<?php

namespace App\Http\Requests;

use App\Models\Reagent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReagentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reagent_create');
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
                'unique:reagents',
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
