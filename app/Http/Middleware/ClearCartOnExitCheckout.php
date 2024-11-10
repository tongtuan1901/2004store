<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClearCartOnExitCheckout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->is('checkout') && session()->has('cart')) {
            // Xóa giỏ hàng khỏi session khi người dùng rời khỏi trang checkout
            session()->forget('cart');
        }

        return $next($request);
    }
}
