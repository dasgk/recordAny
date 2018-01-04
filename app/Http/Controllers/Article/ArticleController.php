<?php

namespace App\Http\Controllers\Article;

use App\Dao\AppUsersDao;
use App\Dao\ArticleCommentDao;
use App\Dao\ArticleDao;
use App\Dao\UsersDao;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
   public function new_article(){
        return view('article.article');
   }
}