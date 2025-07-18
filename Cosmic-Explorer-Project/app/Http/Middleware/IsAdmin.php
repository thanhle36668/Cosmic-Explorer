<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request); // Nếu là admin thì cho phép truy cập
        }

        abort(403, 'Bạn không có quyền truy cập.');
    }
}
