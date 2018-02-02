<?php

namespace App\Dao;

use App\Models\ArticleComment;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\User;
use App\Models\UserArticleRecord;

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
        $header = array('编号', '标题', '浏览量', '评论量', '编辑时间');
        $data = array();
        foreach ($article_list as $article) {
            $data[] = array('id' => $article->article_id, 'title' => $article->title, 'look_num' => $article->look_num, 'comment_num' => $article->comment_num,
                'updated_at' => $article->updated_at->format('Y-m-d - H:i:s'));
        }
        return array('header' => $header, 'data' => $data);
    }


    /**
     * 内容去掉图片
     * @param $content
     */
    private static function get_abstract($content)
    {
        $content = htmlspecialchars_decode($content);
        $img_str = get_img($content);
        while (!empty($img_str)) {
            $content = str_replace($img_str, '', $content);
            $img_str = get_img($content);
        }
        return mb_substr($content, 0, 100, "UTF-8") . '...';
    }

    /**
     * 为首页提供文章列表
     * @param int $page
     * @return array
     */
    public static function get_article_list_for_index($article_raw_list)
    {
        $article_list = array();
        foreach ($article_raw_list as $item) {
            $mm_item = self::get_article_info_by_article_id($item->article_id);
            $article_list[] = $mm_item;
        }
        return $article_list;
    }

    /**
     * 获得文章详情接口
     * @param $article_id
     * @return mixed
     */
    public static function get_article_info_by_article_id($article_id, $reader = 0)
    {
        $item = self::find($article_id);
        $mm_item['title'] = $item->title;
        $uid = $item->uid;
        $user = User::where('uid', $uid)->first();
        $mm_item['author'] = $user->nick_name;
        $mm_item['email'] = $user->email;
        $mm_item['article_id'] = $item->article_id;
        $mm_item['uid'] = $user->uid;
        $mm_item['list_img'] = get_img($item->content);
        $mm_item['abstract'] = self::get_abstract($item->content);
        $mm_item['content'] = $item->content;
        $mm_item['tags'] = LabelDao::get_label_str_list_by_article_id($item->article_id);
        $mm_item['time'] = $item->updated_at->format("Y年m月d日");
        $mm_item['is_collected'] = 0;
        if (!empty($reader)) {
            $is_collected = UserArticleRecord::where('article_id', $article_id)->where('uid', $reader)->where('type', ConstDao::TYPE_COLLECT)->first();
            if (!empty($is_collected)) {
                $mm_item['is_collected'] = 1;
            }
        }
        return $mm_item;
    }

    /**
     * 用户浏览量自增
     * @param $article_id
     */
    public static function increament_article_look_num($article_id)
    {
        $article = self::find($article_id);
        $look_num = $article->look_num;
        $look_num++;
        $article->look_num = $look_num;
        $article->save();
    }

    /**
     * 获得用户收藏的文章
     * @param $uid
     */
    public static function get_collected_article_list_by_uid($uid)
    {
        $record_list = UserArticleRecord::where('uid', $uid)->get();
        $article_ids = array();
        foreach ($record_list as $item) {
            $article_ids[] = $item->article_id;
        }
        $list = array();
        if (!empty($article_ids)) {
            $list = Article::whereIn('article_id', $article_ids)->select(DB::Raw('article_id as id'), 'title', 'look_num', 'comment_num', 'updated_at')->get()->toArray();
        }
        $header = array('编号', '标题', '浏览量', '评论量', '编辑时间');
        $res['header'] = $header;
        $res['data'] = $list;
        return $res;
    }
}
