<?php

namespace App\Http\Controllers\Article;

use App\Dao\AppUsersDao;
use App\Dao\ArticleCommentDao;
use App\Dao\ArticleDao;
use App\Dao\LabelDao;
use App\Dao\UserArticleRecordDao;
use App\Dao\UsersDao;
use App\Exceptions\ApiErrorException;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\ArticleLabel;
use App\Models\Label;
use Illuminate\Support\Facades\Auth;


class LabelController extends Controller
{
    /**
     * 首页提供标签云
     */
    public function labels_for_index()
    {

    }
}