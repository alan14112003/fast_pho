<?php

namespace App\Http\Requests\Cart;

use App\Models\SubProduct;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'id' => [
                'required',
                Rule::exists(SubProduct::class, 'id')
            ],
            'quantity' => [
                'required',
                'numeric',
                'min:1'
            ]
        ];
    }
}
