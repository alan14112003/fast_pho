<?php

namespace App\Http\Controllers;

use App\Enums\UserGenderEnum;
use App\Enums\UserRoleEnum;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Http\Controllers\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ResponseTrait;

    public function login()
    {
        return view('clients/admin/login');
    }

    public function logining($email, $password): array
    {
        $user = User::query()->where('email', $email)->first();

        if (is_null($user)) {
            return [
                'status' => false,
                'body' => null,
                'message' => 'Tài khoản không tồn tại',
            ];
        }

        if (!Hash::check($password, $user->password)) {
            return [
                'status' => false,
                'body' => null,
                'message' => 'Sai mật khẩu',
            ];
        }

        Auth::login($user, true);

        return [
            'status' => true,
            'body' => $user,
            'message' => 'Thành công',
        ];
    }

    public function userLogin(LoginRequest $request)
    {
        $request->validated();
        $logining = $this->logining($request->get('email'), $request->get('password'));

        if ($logining['body']->role !== UserRoleEnum::USER) {
            return $this->responseTrait('Tài khoản không tồn tại');
        }

        if ($logining['status']) {
            $logining['body'] = route('index');
        }

        return response($logining);
    }

    public function adminLogin(LoginRequest $request)
    {
        $request->validated();
        $logining = $this->logining($request->get('email'), $request->get('password'));

        if ($logining['body']->role !== UserRoleEnum::ADMIN) {
            return $this->responseTrait('Không có quyền truy cập');
        }

        if ($logining['status']) {
            $logining['body'] = route('admin.index');
        }

        return response($logining);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $redirect = route('index');

        return $this->responseTrait('Thành công', true, $redirect);
    }

    public function register()
    {
        $userGenderArr = UserGenderEnum::ArrayView();

        return view('clients/auth/register', [
            'userGenderArr' => $userGenderArr
        ]);
    }

    public function registering(RegisterRequest $request)
    {
        $request->validated();

        $userEmail = User::query()
            ->where('email', $request->get('email'))
            ->first();

        if ($userEmail) {
            return $this->responseTrait('Email đã tồn tại');
        }

        $password = Hash::make($request->get('password'));

        $user = User::query()->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $password,
            'gender' => $request->get('gender') ?? 0,
        ]);
        Auth::login($user, true);

        return $this->responseTrait('Thành công', true, route('index'));
    }

    public function profile()
    {
    }
}
