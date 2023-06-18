<?php

namespace App\Http\Controllers\API;

use App\Enums\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ResponseTrait;

    public function countUser(): \Illuminate\Http\JsonResponse
    {
        $userCount = User::query()->where('role', '=',UserRoleEnum::USER)->count();
        return $this->responseTrait('Thành công', true, $userCount);
    }
}
