<?php
// 后台需要登录验证的路由
Route::group([
    'prefix' => 'user',
    'namespace' => 'User',
], function () {
    Route::get('profile', 'ProfileController@index');
    Route::post('modify_comments', 'ProfileController@modify_comments');
    Route::post('modify_nick_name', 'ProfileController@modify_nick_name');
    Route::get('get_info_list', 'ProfileController@get_info_list');

});
