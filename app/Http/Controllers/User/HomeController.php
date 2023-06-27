<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $slides = Slide::query()
            ->where('status', '=', 1)
            ->oldest('index')
            ->get()
        ;

        return view('clients/users/index', [
            'slides' => $slides
        ]);
    }
    
    public function about() {
        return view('clients.users.about');
    }
}
