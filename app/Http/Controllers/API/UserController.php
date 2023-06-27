<?php

namespace App\Http\Controllers\API;

use App\Enums\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Http\Requests\User\UpdateAddressRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use ResponseTrait;

    public function countUser(): \Illuminate\Http\JsonResponse
    {
        $userCount = User::query()->where('role', '=', UserRoleEnum::USER)->count();
        return $this->responseTrait('Thành công', true, $userCount);
    }

    public function updateAddress(UpdateAddressRequest $request)
    {
        try {
            if (Auth::check()) {
                if (
                    Auth::user()->province != $request->get('province') ||
                    Auth::user()->district != $request->get('district') ||
                    Auth::user()->ward != $request->get('ward') ||
                    Auth::user()->address != $request->get('address')
                ) {
                    User::query()->find(Auth::id())->update([
                        'province' => $request->get('province'),
                        'district' => $request->get('district'),
                        'ward' => $request->get('ward'),
                        'address' => $request->get('address'),
                    ]);
                }
            } else {
                return $this->responseTrait('Đăng nhập tài khoản trước khi lưu địa chỉ!');
            }
        } catch (\Throwable $e) {
            return $this->responseTrait('Có lỗi! ' . $e->getMessage());
        }
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        try {
            if (!Auth::check()) return $this->responseTrait('Bạn chưa đăng nhập');

            User::query()->find(Auth::id())->update($request->validated());

            return $this->responseTrait('Sửa thông tin thành công', true);
        } catch (\Throwable $e) {
            return $this->responseTrait("Có lỗi! {$e->getMessage()}");
        }
    }

    public function changePassword(Request $request)
    {
        try {
            if (!Auth::check()) return $this->responseTrait('Bạn chưa đăng nhập');

            if (!Hash::check($request->get('old_password'), Auth::user()->password)) {
                return $this->responseTrait('Sai mật khẩu cũ');
            }

            $newPassword = Hash::make($request->get('new_password'));
            User::query()->find(Auth::id())->update([
                'password' => $newPassword
            ]);

            return $this->responseTrait('Sửa thông tin thành công', true);
        } catch (\Throwable $e) {
            return $this->responseTrait("Có lỗi! {$e->getMessage()}");
        }
    }
}
