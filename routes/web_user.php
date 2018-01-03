<?php
// 后台需要登录验证的路由
Route::group([
    'prefix' => 'user',
    'namespace' => 'User',
], function () {
    Route::get('profile', 'ProfileController@index');
});
