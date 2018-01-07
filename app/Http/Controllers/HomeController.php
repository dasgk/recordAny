<?php

namespace App\Http\Controllers;

use App\Dao\ArticleCommentDao;
use App\Dao\ArticleDao;
use App\Models\Article;

class HomeController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res['article_list'] = ArticleDao::get_article_list_for_index();
        return view('home', $res);
    }
}
