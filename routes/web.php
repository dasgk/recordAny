<?php
$route_group = array();
$platformArray = config('platform');
// 接口平台，例：p=i，代表IOS
$p_key = isset($_REQUEST['p']) ? $_REQUEST['p'] : '';

if ($p_key && isset($platformArray[$p_key])) {
	$route_group['namespace'] = '\\' . $platformArray[$p_key];
}else{
//	echo 'error platform';
//	die;
}
Route::group($route_group, function () {
	Route::get('/', 'IndexController@index');
	Route::post('/user/login', 'UserController@login');
	Route::post('/user/register', 'UserController@register');
	Route::get('/qqlogin','IndexController@qqlogin');
	Route::get('/qq','IndexController@qq');
	Route::get('/content','IndexController@content');
	Route::get('/show_new_record','ArticleController@show_new_record');

});