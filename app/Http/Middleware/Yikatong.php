<?php

namespace App\Http\Middleware;

use Closure;

class Yikatong
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!session('isLogin')){
            session(['target'=>$request->fullUrl() ? $request->fullUrl() : url('/yikatong/liushui?user='.$request->input('user'))]);
            return redirect('wx/yikatong/login?user='.$request->input('user'));
        }
        return $next($request);
    }
}
