<?php
$route_group = array();
$platformArray = config('platform');
// 接口平台，例：p=i，代表IOS
$p_key = isset($_REQUEST['p']) ? $_REQUEST['p'] : '';
if ($p_key && isset($platformArray[$p_key])) {
	$route_group['namespace'] = '\\' . $platformArray[$p_key];
} else {
}
Route::group($route_group, function () {

	Route::get('/', 'IndexController@index');

	Route::group([
		'prefix' => '/search',
	], function () {
		include "web_search.php";
	});

	Route::group([
		'prefix' => '/user',
	], function () {
		include "web_user.php";
	});

	Route::group([
		'prefix' => '/article',
	], function () {
		include "web_article.php";
	});

	Route::get('/qqlogin', 'IndexController@qqlogin');
	Route::get('/qq', 'IndexController@qq');
});