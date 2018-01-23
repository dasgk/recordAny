<?php

namespace App\Dao;

use App\Models\ArticleComment;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class ArticleCommentDao extends ArticleComment
{
    /**
     * 获得评论过自己文章的用户
     */
    public static function get_uids_by_comments($uid)
    {
        $list = Article::where('uid', $uid)->select('article_id')->get();
        $article_ids = array();
        foreach ($list as $item) {
            $article_ids[] = $item->article_id;
        }
        $relative_uids = array();
        if (!empty($article_ids)) {
            $list = ArticleCommentDao::whereIn('article_id', $article_ids)->select('uid')->get();
            foreach ($list as $item) {
                $relative_uids[] = $item->uid;
            }
        }
        return $relative_uids;
    }

    /**
     * 获得自己所有的评论
     * @param $uid
     * @return array
     */
    public static function get_comments_by_uid($uid)
    {
        $list = self::where('uid', $uid)->select('title', 'article_id')->get();
        $res = array('header' => array('编号', '内容', '来源'),
            'data' => array(array('1', '这是我的评论', '文章1')));
        return $res;
    }

    /**
     * 获得特定文章的评论详情
     * @param $article_id
     */
    public static function get_comments_by_article_id($article_id)
    {
        $article_model = Article::where('article_id', $article_id)->first();
        $res = array();
        if (empty($article_model)) {
            return $res;
        }
        $comment_list = self::join('users', 'users.uid', '=', 'article_comments.uid')->where('article_id', $article_id)
            ->select('article_comments.title','users.uid','users.nick_name','users.avatar','article_comments.created_at')
            ->orderBy('article_comments.id', 'desc')->get()->toArray();
       foreach($comment_list as $key=>$item){
           if(empty($comment_list[$key]['avatar'])){
               $comment_list[$key]['avatar'] = cdn('img/default_user.png');
           }
       }
       return $comment_list;
    }
}
