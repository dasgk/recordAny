<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PcLoginCheck
{
    /**
     * PC端如果没有登录跳转到首页
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	if(!Auth::check()){
			redirect('/?p=c');
		}
        return $next($request);
    }
}
