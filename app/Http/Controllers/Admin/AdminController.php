<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $currentPage = 'home';

        return view('clients.admin.index', [
            'currentPage' => $currentPage
        ]);
    }
}
