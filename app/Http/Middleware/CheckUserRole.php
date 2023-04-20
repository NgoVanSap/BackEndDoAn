<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::guard('api')->check()) {

            if (auth()->user()->phanQuyen == 2) {

                return $next($request);

            } else {

                return response()->json(['error' => 'Bạn không có quyền để đăng n.'], 401);

            }
        } else {

            return response()->json(['error' => 'Bạn chưa đăng nhập.'], 401);

        }
    }
}
