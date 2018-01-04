<?php
// 后台需要登录验证的路由
Route::group([
    'prefix' => 'article',
    'namespace' => 'Article',
], function () {
    Route::get('new_article', 'ArticleController@new_article');
});
