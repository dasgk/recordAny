<?php
// 后台需要登录验证的路由
Route::group([
    'prefix' => 'search',
    'namespace' => 'Search',
], function () {
    Route::get('/index', 'SearchController@index');
});
