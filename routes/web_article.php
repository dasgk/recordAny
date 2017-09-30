<?php
Route::get('/show_new_record', 'ArticleController@show_new_record')->middleware('PcLoginCheck');
Route::post('/save_article', 'ArticleController@save_article')->middleware('PcLoginCheck');
Route::get('/content', 'IndexController@content'); //PC端文章列表