<?php
// 后台需要登录验证的路由
Route::group([
    'prefix' => 'articles',
    'namespace' => 'Article',
], function () {
    Route::get('/', 'ArticleController@new_article');
    Route::post('save_article', 'ArticleController@save_article');
});
