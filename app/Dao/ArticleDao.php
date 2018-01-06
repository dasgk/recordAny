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
        $header = array('编号','标题','浏览量' ,'评论量','编辑时间');
        $data = array();
        foreach($article_list as $article){
            $data[] = array('id'=>$article->article_id,'title'=>$article->title,'look_num'=>$article->look_num,'comment_num'=>$article->comment_num,
                'updated_at'=>$article->updated_at->format('Y-m-d - H:i:s'));
        }
        return array('header'=>$header,'data' =>$data);
    }
}
