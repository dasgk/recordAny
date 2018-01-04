<?php

namespace App\Dao;

use App\Models\ArticleComment;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class ArticleDao extends Article
{
    /**
     * 获得某个用户的所有文章
     * @param $uid
     */
    public static function get_article_list_by_uid($uid, $page = 1)
    {
        $article_list = self::where('uid', $uid)->orderBy('article_id', 'desc')->take(15)->skip(($page - 1) * 15)->select('article_id', 'title',
            'look_num', 'comment_num', 'updated_at')->get();
        return array('header'=>array('编号','标题','浏览量' ,'评论量','编辑时间'),'data' => array(array('article_id' => 1,
            'title' => '测试标题',
            'look_num' => 30,
            'comment_num' => 25,
            'updated_at' => '2017-12-31 09:08:00')));
        return $article_list;
    }
}
