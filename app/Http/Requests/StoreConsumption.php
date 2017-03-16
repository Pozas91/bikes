<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreConsumption extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @param Request $request
     * @return bool
     */
    public function authorize(Request $request)
    {
        return !is_null($request->user());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @param Request $request
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'km' => [
                'required',
                'numeric',
                'min:0'
            ],
            'liters' => [
                'required',
                'numeric',
                'min:0'
            ],
            'driving_type' => [
                'required',
                'in:urban,mixed,highway'
            ],
            'passenger' => [
                'required',
                'in:yes,no'
            ]
        ];
    }
}
