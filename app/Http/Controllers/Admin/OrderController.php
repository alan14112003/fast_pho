<?php

namespace App\Http\Controllers\Admin;

use App\Enums\OrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
{
    public function __construct()
    {
        //  set currentPage để kiểm tra trang hiện tại ở side bar
        $currentPage = 'order';

        View::share('currentPage', $currentPage);
    }

    //  Tạo ra hàm dùng chung array view Status
    private function arrayViewStatus(): array
    {
        $arrayViewStatus = [];
        foreach (OrderStatusEnum::arrayView() as $name => $value) {
            $arrayViewStatus[] = [
                'name' =>$name,
                'value' => $value
            ];
        }
        return $arrayViewStatus;
    }

    //  hàm products trả về view order product
    public function products(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $arrayViewStatus = $this->arrayViewStatus();

        return view('clients.admin.orders.products', [
            'arrayViewStatus' => $arrayViewStatus
        ]);
    }

    public function product($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('clients.admin.orders.product', [
            'id' => $id,
        ]);
    }

    //  Trả về view order photo
    public function photos(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $arrayViewStatus = $this->arrayViewStatus();

        return view('clients.admin.orders.photos', [
            'arrayViewStatus' => $arrayViewStatus
        ]);
    }

    public function photo($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('clients.admin.orders.photo', [
            'id' => $id,
        ]);
    }

    public function bill($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('clients.admin.orders.photo_bill', [
            'id' => $id,
        ]);
    }
}
