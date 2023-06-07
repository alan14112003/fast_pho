<?php

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAPIMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return response([
                'status' => false,
                'body' => null,
                'message' => 'Chưa đăng nhập'
            ]);
        }
        if (Auth::user()->role == UserRoleEnum::USER) {
            return response([
                'status' => false,
                'body' => null,
                'message' => 'Không có quyền truy cập'
            ]);
        }
        return $next($request);
    }
}
