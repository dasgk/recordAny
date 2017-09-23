<?php

namespace App\Http\Controllers\PC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
	/**
	 * 网站首页
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index(Request $request){
		return view('PC.index');
	}

	/**
	 * 显示QQ的登录页面
	 * @return mixed
	 */
	public function qq(){
		return Socialite::with('qq')->redirect();
	}

	/**
	 * qq登录成功回调函数
	 */
	public function qqlogin(){
		$user = Socialite::driver('qq')->user();
		dd($user);
	}

	public function content(){
		return view('PC.content');
	}
}