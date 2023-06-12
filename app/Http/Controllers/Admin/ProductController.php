<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    public function __construct()
    {
        $currentPage = 'product';

        View::share('currentPage', $currentPage);
    }

    public function index()
    {
        return view('clients.admin.products.index');
    }

    public function edit()
    {
        return view('clients.admin.products.edit');
    }
}
