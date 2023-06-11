<?php

namespace App\Http\Requests;

use App\Models\Patient;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePatientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('patient_edit');
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
                'unique:patients,phone,' . request()->route('patient')->id,
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
                'unique:patients,social_security_number,' . request()->route('patient')->id,
            ],
        ];
    }
}
