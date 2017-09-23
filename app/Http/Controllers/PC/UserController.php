<?php

namespace App\Http\Controllers\PC;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use App\User;

class UserController extends Controller
{
	use AuthenticatesUsers;
	use RegistersUsers;

	protected $redirectTo = "/home";


	protected function guard()
	{
		return Auth::guard();
	}

	/**
	 * 为了通过编译器，登录注册都是ajax请求，该方法没有使用
	 * @authro zjy 20170921
	 * @return string
	 */
	protected function redirectPath()
	{
		return '/?p=c';
	}

	/**
	 * 注册使用验证逻辑
	 * @author zjy 20170921
	 * @param array $data
	 * @param $request
	 * @return bool
	 */
	protected function validator(array $data, $request)
	{
		$validitor = Validator::make($data, [
			'register_user_name' => 'required|phone|max:30|unique:users,user_name', //
			'register_password' => 'required|pwd',
		]);
		if ($validitor->fails()) {
			return $validitor->errors()->first();
		}
		return true;
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array $data
	 * @return User
	 */
	protected function create(array $data)
	{
		$param = [
			'user_name' => $data['register_user_name'],
			'password' => md5($data['register_password'] . env('HASH_CODE')),
		];
		return User::create($param);
	}
}