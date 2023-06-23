<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Http\Requests\Cart\AddRequest;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    use ResponseTrait;

    private string $cartName = 'cart';

    public function all(Request $request)
    {
        $cart = [];

        if ($request->cookie($this->cartName)) {
            $cart = json_decode($request->cookie($this->cartName), true);
        }

        if (empty($cart)) {
            return $this->responseTrait('Thành công', true, $cart);
        }

        $cartIds = array_keys($cart);

        $products = Product::query()
            ->join('sub_products', 'products.id', '=', 'sub_products.product_id')
            ->whereIn('sub_products.id', $cartIds)
            ->get();

        foreach ($products as $product) {
            $product->quantity = $cart[$product->id];
        }

        return $this->responseTrait('Thành công', true, $products);
    }

    public function update(AddRequest $request)
    {
        $cart = [];
        $subProductId = $request->get('id');
        $quantity = $request->get('quantity');

        if ($request->cookie($this->cartName)) {
            $cart = json_decode($request->cookie($this->cartName), true);
        }

        $expiration = Carbon::now()->addYear()->timestamp;
        $cart[$subProductId] = isset($cart[$subProductId]) ? $cart[$subProductId] + $quantity : $quantity;

        return $this->responseTrait('Thành công', true)
            ->withCookie(cookie($this->cartName, json_encode($cart), $expiration, '/'));
    }

    public function remove($id, Request $request)
    {
        $cart = [];

        if ($request->cookie($this->cartName)) {
            $cart = json_decode($request->cookie($this->cartName), true);
        }

        if (!$cart[$id]) {
            return $this->responseTrait('Không có sản phẩm này trong giỏ hàng');
        }

        unset($cart[$id]);
        $expiration = Carbon::now()->addYear()->timestamp;
        return $this->responseTrait('Thành công', true)
            ->withCookie(cookie($this->cartName, json_encode($cart), $expiration, '/'));
    }

    public function emptyCart(): \Illuminate\Http\JsonResponse
    {
        $cart = [];

        $expiration = Carbon::now()->addYear()->timestamp;
        return $this->responseTrait('Thành công')
            ->withCookie(cookie($this->cartName, json_encode($cart), $expiration, '/'));
    }
}
