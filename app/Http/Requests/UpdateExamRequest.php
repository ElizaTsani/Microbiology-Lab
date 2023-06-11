<?php

namespace App\Http\Requests;

use App\Models\Exam;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateExamRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('exam_edit');
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
                'unique:exams,code,' . request()->route('exam')->id,
            ],
            'disease' => [
                'string',
                'nullable',
            ],
        ];
    }
}
