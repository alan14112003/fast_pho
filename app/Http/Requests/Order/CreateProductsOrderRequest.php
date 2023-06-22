<?php

namespace App\Http\Requests\Order;

use App\Enums\OrderTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateProductsOrderRequest extends FormRequest
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
            'user_name' => [
                'required',
                'string'
            ],
            'user_phone' => [
                'required',
                'string'
            ],
            'user_address' => [
                'required'
            ],
            'user_ward' => [
                'required'
            ],
            'user_district' => [
                'required'
            ],
            'user_province' => [
                'required'
            ],
            'products' => [
                'required'
            ],
            'payment' => [
                'required',
                Rule::in(OrderTypeEnum::asArray())
            ]
        ];
    }
}
