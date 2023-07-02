<?php

namespace App\Http\Controllers\User;

use App\Enums\ProductFilterEnum;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $arrFilter = ProductFilterEnum::ArrayView();

        return view('clients/users/products/index', [
            'arrFilter' => $arrFilter,
            'cur_page' => 'products'
        ]);
    }

    public function show($slug)
    {
        return view('clients/users/products/show', [
            'cur_page' => 'product'
        ]);
    }
}
