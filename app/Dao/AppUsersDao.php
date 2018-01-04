<?php

namespace App\Dao;

use App\Models\AppUsers;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Dao\ArticleCommentDao;

class AppUsersDao extends AppUsers
{
    public static function get_info_for_profile($id){
        $uids = $id;
        if(!is_array($id)){
            $uids = array($id);
        }

        $users = self::whereIn('uid',$uids)->get();
        $res = array();
        foreach($users as $user){
            $item['nick_name'] = $user->nick_name;
            $item['comments'] = $user->comments;
            $item['avatar'] = $user->avatar;
            $item['article_num'] = Article::where('uid', $id)->count();
            $item['comment_num'] = ArticleCommentDao::where('uid', $user->uid)->count();
            $item['friend_num'] = count(ArticleCommentDao::get_uids_by_comments($user->uid));
            $res[$user->uid] = $item;
        }
        if(!is_array($id)){
            return $res[$id];
        }
        return $res;
    }
}
