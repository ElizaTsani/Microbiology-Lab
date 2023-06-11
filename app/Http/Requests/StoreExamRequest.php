<?php

namespace App\Http\Requests;

use App\Models\Exam;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreExamRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('exam_create');
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
                'unique:exams',
            ],
            'disease' => [
                'string',
                'nullable',
            ],
        ];
    }
}
