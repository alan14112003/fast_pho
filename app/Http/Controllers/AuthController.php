<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('login');
    }

    public function logining(LoginRequest $request): \Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $request->validated();

        $user = User::query()->where('email', $request->get('email'))->first();
        if (is_null($user)) {
            return response([
                'status' => false,
                'body' => null,
                'message' => 'Tài khoản không tồn tại',
            ]);
        }
        if (!Hash::check($request->get('password'), $user->password)) {
            return response([
                'status' => false,
                'body' => null,
                'message' => 'Sai mật khẩu',
            ]);
        }
        Auth::login($user, true);

        $redirect = route('index');
        if ($user->role == UserRoleEnum::ADMIN) {
            $redirect = route('admin.index');
        }

        return response([
            'status' => true,
            'body' => $redirect,
            'message' => 'Thành công',
        ]);
    }


    public function logout(Request $request): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }

    public function register(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('register');
    }

    public function registering(RegisterRequest $request): \Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $request->validated();

        $userEmail = User::query()
            ->where('email', $request->get('email'))
            ->first();

        if ($userEmail) {
            return response([
                'status' => false,
                'body' => null,
                'message' => 'Email đã tồn tại',
            ]);
        }

        $userPhone = User::query()
            ->where('phone', $request->get('phone'))
            ->first();

        if ($userPhone) {
            return response([
                'status' => false,
                'body' => null,
                'message' => 'Số điện thoại đã tồn tại',
            ]);
        }

        $password = Hash::make($request->get('password'));

        $user = User::query()->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $password,
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'gender' => $request->get('gender'),
        ]);
        Auth::login($user, true);

        return response([
            'status' => true,
            'body' => route('index'),
            'message' => 'Thành công',
        ]);
    }
}
