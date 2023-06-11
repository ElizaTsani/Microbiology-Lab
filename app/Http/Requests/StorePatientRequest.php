<?php

namespace App\Http\Requests;

use App\Models\Patient;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePatientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('patient_create');
    }

    public function rules()
    {
        return [
            'first_name' => [
                'string',
                'nullable',
            ],
            'last_name' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'min:10',
                'max:13',
                'required',
                'unique:patients',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'social_security_number' => [
                'string',
                'min:10',
                'max:12',
                'required',
                'unique:patients',
            ],
        ];
    }
}
