<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $currentPage = 'home';
        $userCount = User::query()->where('role', '=',UserRoleEnum::USER)->count();
        $productCount = Product::query()->count();

        $orderProductCount = Order::query()
            ->join('order_product', 'orders.id', '=', 'order_product.order_id')
            ->groupBy('orders.id')
            ->get()->count()
        ;

        $orderPhotoCount = Order::query()
            ->join('order_photo', 'orders.id', '=', 'order_photo.order_id')
            ->groupBy('orders.id')
            ->get()->count()
        ;

        return view('clients.admin.index', [
            'currentPage' => $currentPage,
            'userCount' => $userCount,
            'productCount' => $productCount,
            'orderProductCount' => $orderProductCount,
            'orderPhotoCount' => $orderPhotoCount,
        ]);
    }
}
