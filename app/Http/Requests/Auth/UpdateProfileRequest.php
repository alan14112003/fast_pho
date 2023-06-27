<?php

namespace App\Http\Requests\Auth;

use App\Enums\UserGenderEnum;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
            'name' => [
                'required'
            ],
            'phone' => [
                'required',
                Rule::unique(User::class, 'phone')->ignore(Auth::id())
            ],
            'email' => [
                'required',
                Rule::unique(User::class, 'email')->ignore(Auth::id())
            ],
            'gender' => [
                'required',
                Rule::in(UserGenderEnum::asArray())
            ],
            'address' => [
                'required',
            ],
            'province' => [
                'required'
            ],
            'district' => [
                'required'
            ],
            'ward' => [
                'required'
            ]
        ];
    }
}
