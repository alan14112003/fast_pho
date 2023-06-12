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

    public function edit()
    {
        return view('clients.admin.products.subs.edit');
    }
}
