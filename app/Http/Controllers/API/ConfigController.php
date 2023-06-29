<?php

namespace App\Http\Controllers\API;

use App\Enums\ConfigInfoTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfigController extends Controller
{
    use ResponseTrait;

    public function getEmailAdmin(): \Illuminate\Http\JsonResponse
    {
        $email = Config::query()->where('info_type', ConfigInfoTypeEnum::MAIL_ADMIN)
            ->first()->info_1;
        return $this->responseTrait('Thành công', true, $email);
    }

    public function updateEmailAdmin(Request $request): \Illuminate\Http\JsonResponse
    {
        $email = Config::query()->where('info_type', ConfigInfoTypeEnum::MAIL_ADMIN)
            ->update([
                'info_1' => $request->get('email')
            ])
        ;
        return $this->responseTrait('Thành công', true, $email);
    }

    public function allBank(): \Illuminate\Http\JsonResponse
    {
        $banks = Config::query()->where('info_type', ConfigInfoTypeEnum::BANK)
            ->get();

        return $this->responseTrait('Thành công', true, $banks);
    }

    public function getBank($id): \Illuminate\Http\JsonResponse
    {
        $bank = Config::query()->where('info_type', ConfigInfoTypeEnum::BANK)
            ->find($id);

        return $this->responseTrait('Thành công', true, $bank);
    }

    public function createBank(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $bank = Config::query()->create([
                'info_type' => ConfigInfoTypeEnum::BANK,
                'info_2' => $request->get('content')
            ]);

            $imagePath = Storage::disk('public')->putFileAs(
                "images/qr_code/{$bank->id}",
                $request->file('qr_code'),
                "image.{$request->file('qr_code')->extension()}"
            );

            $bank->update([
                'info_1' => $imagePath
            ]);

            return $this->responseTrait('Thêm thành công', true, $bank);
        } catch (\Exception $e) {
            return $this->responseTrait("Có lỗi! {$e->getMessage()}");
        }
    }

    public function updateBank(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        try {
            $bank = Config::query()->find($id);

            if (is_null($bank)) {
                return $this->responseTrait('Không có bank này');
            }

            $bank->update([
                'info_2' => $request->get('content')
            ]);

            if ($request->hasFile('qr_code')) {
                $imagePath = Storage::disk('public')->putFileAs(
                    "images/qr_code/{$bank->id}",
                    $request->file('qr_code'),
                    "image.{$request->file('qr_code')->extension()}"
                );
    
                $bank->update([
                    'info_1' => $imagePath
                ]);
            }

            return $this->responseTrait('Sửa thành công', true, $bank);
        } catch (\Exception $e) {
            return $this->responseTrait("Có lỗi! {$e->getMessage()}");
        }
    }

    public function destroyBank($id): \Illuminate\Http\JsonResponse
    {
        try {
            $bank = Config::query()->find($id);

            if (is_null($bank)) {
                return $this->responseTrait('Không có bank này');
            }

            Storage::deleteDirectory("public/images/qr_code/{$bank->id}");
            $bank->delete();

            return $this->responseTrait('Xóa thành công', true);
        } catch (\Exception $e) {
            return $this->responseTrait("Có lỗi! {$e->getMessage()}");
        }
    }
}
