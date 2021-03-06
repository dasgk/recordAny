<?php

namespace App\Http\Controllers\User;

use App\Dao\AppUsersDao;
use App\Dao\ArticleCommentDao;
use App\Dao\ArticleDao;
use App\Dao\LabelDao;
use App\Dao\UsersDao;
use App\Http\Controllers\Controller;
use App\Models\Label;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * 个人中心请求
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::User();
        $res['user'] = AppUsersDao::get_info_for_profile($user->uid);
        if (empty($user->comments)) {
            $user->comments = '这家伙很懒，啥也没写...';
        }
        $types = config('tab_type');
        $res['types'] = $types;
        $res['labels'] = LabelDao::get_label_str_list_by_uid($user->uid);
        return view('user.profile', $res);
    }

    /**
     * 修改个人简介
     */
    public function modify_comments()
    {
        $user = Auth::User();
        $res['user'] = $user;
        $comments = request('comments');
        $user->comments = $comments;
        $user->save();
    }

    /**
     * 修改用户昵称
     */
    public function modify_nick_name()
    {
        $user = Auth::User();
        $res['user'] = $user;
        $nick_name = request('nick_name');
        $user->nick_name = $nick_name;
        $user->save();
    }

    /**
     * 获得博客列表，评论列表，互动好友列表
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_info_list()
    {
        $user = Auth::user();
        $uid = $user->uid;
        $type = request('type');
        if ($type == 'articles') {
            $res['data'] = ArticleDao::get_article_list_by_uid($uid);
            $res['type'] = 'article';
        } elseif ($type == 'comments') {
            $res['data'] = ArticleCommentDao::get_comments_by_uid($uid);
            $res['type'] = 'comment';
        } elseif($type=='collects') {
            //我的收藏
            $res['data'] = ArticleDao::get_collected_article_list_by_uid($uid);
            $res['type'] = 'collect';
        }else{
            //互动好友
            $res = ArticleDao::get_article_list_by_uid($uid);
        }
        return response_json(1, $res);
    }
}