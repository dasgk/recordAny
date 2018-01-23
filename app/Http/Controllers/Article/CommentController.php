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


class CommentController extends Controller
{
    public function save_comments()
    {
        $content = request('content');
        $article_id = request('article_id');
        $is_set = Article::find($article_id);
        if(empty($is_set)){
            return response_json(0, [], '评论文章不存在');
        }
        if (empty($content)) {
            return response_json(0, [], '请填入回复内容');
        }
        $comment_modal = new ArticleComment();
        $comment_modal->article_id = $article_id;
        $comment_modal->uid = Auth::user()->uid;
        $comment_modal->title = $content;
        $comment_modal->save();
        $comment_num = $is_set->comment_num;
        $comment_num++;
        $is_set->comment_num = $comment_num;
        $is_set->save();
        return response_json(1, [], '回复成功');
    }
}