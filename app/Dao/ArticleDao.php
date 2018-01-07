<?php

namespace App\Dao;

use App\Models\ArticleComment;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\User;

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

    /**
     * 内容去掉图片
     * @param $content
     */
    private static function get_abstract($content){
        $content = htmlspecialchars_decode($content);
        $img_str = get_img($content);
        while(!empty($img_str)){
           $content= str_replace($img_str,'',$content);
            $img_str = get_img($content);
        }
        return substr($content,0,50);
    }

    public static function get_article_list_for_index($page = 1){
        $article_raw_list = Article::orderBy('look_num','desc')->orderBy('article_id','desc')->skip(($page-1)*10)->take(10)->get();
        $article_list = array();
        foreach ($article_raw_list as $item) {
            $mm_item['title'] = $item->title;
            $uid = $item->uid;
            $user = User::where('uid', $uid)->first();
            $mm_item['author'] = $user->nick_name;
            $mm_item['uid'] = $user->uid;
            $mm_item['list_img'] = get_img($item->content);
            $mm_item['abstract'] = self::get_abstract($item->content);
            $mm_item['tags'] = LabelDao::get_label_str_list_by_article_id($item->article_id);
            $mm_item['time'] = $item->updated_at->format("Y年m月d日");
            $article_list[] = $mm_item;
        }
        return $article_list;
    }
}
