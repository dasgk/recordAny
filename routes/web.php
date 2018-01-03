<?php

// 首页
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@welcome');

// 前台登录注册路由
Auth::routes();

// 前台需要登录验证的路由
Route::group([
	'middleware' => 'auth'
], function () {
    include_once 'web_user.php';
});

// 后台登录路由
Route::group([
	'prefix' => 'admin',
	'namespace' => 'Admin',
], function () {
	Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'LoginController@login');
	Route::post('logout', 'LoginController@logout');
});
