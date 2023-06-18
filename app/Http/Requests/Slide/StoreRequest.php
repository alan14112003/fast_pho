<?php

namespace App\Http\Requests\Slide;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'src' => [
                'required',
                'file'
            ],
            'redirect' => [
                'nullable',
                'string'
            ],
            'status' => [
                'required',
            ],
            'index' => [
                'required'
            ]
        ];
    }
}
