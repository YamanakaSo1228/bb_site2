<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRefererMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // リクエストが特定のURL以外から送信された場合
        if ($request->server('HTTP_REFERER') !== 'http://localhost:8888/inquiry') {
            // エラー画面を表示する
            return response()->view('errors.backError', [], 403);
        }

        return $next($request);
    }
}
