<?php
Route::get('/show_new_record', 'ArticleController@show_new_record');
Route::post('/save_article', 'ArticleController@save_article');
Route::get('/content', 'IndexController@content');