<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ConfigController extends Controller
{
    public function __construct()
    {
        //  set currentPage để kiểm tra trang hiện tại ở side bar
        $currentPage = 'config';

        View::share('currentPage', $currentPage);
    }

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('clients.admin.config.index');
    }

    public function createBank() {
        return view('clients.admin.config.create_bank');
    }

    public function editBank($id) {
        return view('clients.admin.config.edit_bank', [
            'id' => $id
        ]);
    }
}
