<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SubProductController extends Controller
{
    public function __construct()
    {
        $currentPage = 'product';

        View::share('currentPage', $currentPage);
    }

    public function index()
    {
        return view('clients.admin.products.subs.index');
    }

    public function create()
    {
        return view('clients.admin.products.subs.create');
    }

    public function edit($productId, $id)
    {
        return view('clients.admin.products.subs.edit', [
            'productId' => $productId,
            'id' => $id
        ]);
    }
}
