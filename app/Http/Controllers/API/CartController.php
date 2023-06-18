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

        $products = Product::query()->whereIn('id', $cartIds)->get();
        foreach ($products as $product) {
            $product->quantity = $cart[$product->id];
        }

        return $this->responseTrait('Thành công', true, $products);
    }

    public function add(AddRequest $request)
    {
        $cart = [];
        $productId = $request->get('product_id');
        $quantity = $request->get('quantity');

        if ($request->cookie($this->cartName)) {
            $cart = json_decode($request->cookie('cart'), true);
        }

        $expiration = Carbon::now()->addYear();
        $cart[$productId] = isset($cart[$productId]) ? $cart[$productId] + $quantity : $quantity;

        return response([
            'status' => true,
            'body' => $cart,
            'message' => 'Thành công'
        ])->withCookie($this->cartName, json_encode($cart), $expiration);
    }
}
