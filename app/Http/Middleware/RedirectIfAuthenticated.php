<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Nếu người dùng đã đăng nhập, chuyển hướng họ đến trang chủ (hoặc trang bạn muốn)
                return redirect('/'); // Thay '/' bằng đường dẫn bạn muốn chuyển hướng đến, ví dụ: '/dashboard'
            }
        }

        return $next($request);
    }
}
