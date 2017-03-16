<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StoreBike extends FormRequest
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
            'branch' => [
                'required_without:bike',
                'min:3',
            ],
            'model' => [
                'required_without:bike',
            ],
            'engine' => [
                'required_without:bike',
                'integer',
                'min:35',
            ],
            'bike' => [
                'required_without:branch',
                'exists:bikes,id',
                Rule::unique('user_have_bikes', 'bike_id')->where(function($query) use ($request) {
                    $query->where('user_id', $request->user()->id);
                })
            ]
        ];
    }
}
