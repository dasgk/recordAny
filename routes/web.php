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
	Route::post('/save_article','ArticleController@save_article');
});
Route::get('/search/{key}', function ($key){
	$xs = new XS(config_path('search-demo.ini'));
	$search = $xs->search; // 获取 搜索对象
	$query = $key;
	$search->setQuery($query)
		->setSort('id', true) //按照chrono 正序排列
		->setLimit(20,0) // 设置搜索语句, 分页, 偏移量
	;

	$docs = $search->search(); // 执行搜索，将搜索结果文档保存在 $docs 数组中
	$count = $search->count(); // 获取搜索结果的匹配总数估算值
	foreach ($docs as $doc){
		$subject = $search->highlight($doc->title); // 高亮处理 subject 字段
		$message = $search->highlight($doc->message); // 高亮处理 message 字段
		echo $doc->rank() . '. ' . $subject . " [" . $doc->percent() . "%] - ";
		echo date("Y-m-d", $doc->chrono) . "<br>" . $message . "<br>";
		echo '<br>========<br>';
	}
	echo  '总数:'. $count;
});