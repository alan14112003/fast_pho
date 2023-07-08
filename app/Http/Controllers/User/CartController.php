<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private string $cartName = 'cart';

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('clients/users/cart/index');
    }

    public function details(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {

        if (!$request->cookie($this->cartName) || empty(json_decode($request->cookie($this->cartName)))) {
            return redirect()->back()->with('error', 'Không có sản phẩm nào trong giỏ hàng');
        }
        return view('clients/users/cart/detail');
    }

    public function history() {
        return view('clients.users.cart.history');
    }

    public function historyProduct($id) {
        return view('clients.users.cart.history_product', [
            'id' => $id
        ]);
    }

    public function historyPhoto($id) {
        return view('clients.users.cart.history_photo', [
            'id' => $id
        ]);
    }
}
