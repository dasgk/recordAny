<?php

// 首页
Route::get('/', 'HomeController@index');
//关于
Route::get('/about', 'HomeController@about');
Route::post('/stat', 'HomeController@stat');

// 前台登录注册路由
Auth::routes();

include_once  'web_search.php';
// 前台需要登录验证的路由
Route::group([
	'middleware' => 'auth'
], function () {
    include_once 'web_user.php';
    include_once 'web_article.php';
});
include_once 'web_search.php';

Route::group([
    'prefix' => 'articles',
    'namespace' => 'Article',
], function () {

    Route::get('/article_detail', 'ArticleController@article_detail');
    Route::get('/test', 'ArticleController@test');
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
Route::post('/ueditor/uploadfile', 'UeditorController@uploadfile');
Route::post('/ueditor/uploadimage', 'UeditorController@uploadimage');