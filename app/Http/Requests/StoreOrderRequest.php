<?php

namespace App\Http\Requests;

use App\Models\Order;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_create');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'required',
                'unique:orders',
            ],
            'date_done' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'date_skipped' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'reagents.*' => [
                'integer',
            ],
            'reagents' => [
                'array',
            ],
        ];
    }
}
