<?php

namespace App\Dao;

use App\Models\ArticleComment;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Models\ArticleLabel;
use App\Models\Label;
use Illuminate\Support\Facades\DB;

class LabelDao extends Article
{
    /**
     * 根据文章ID获得所有标签列表
     * @param $article_id
     * @return array
     */
    public static function get_label_str_list_by_article_id($article_id)
    {
        $label_list = ArticleLabel::where('article_id', $article_id)->select('label_id')->get();
        $label_ids = array();
        foreach ($label_list as $label) {
            $label_ids[] = $label->label_id;
        }
        $label_str_list = array();
        if (!empty($label_ids)) {
            $labels = Label::whereIn('label_id', $label_ids)->get();
            foreach ($labels as $label) {
                $label_str_list[] = $label->title;
            }
        }
        return $label_str_list;
    }

    /**
     * 获得用户的标签列表
     * @param $uid
     * @return array
     */
    public static function get_label_str_list_by_uid($uid)
    {
        $labels = self::where('uid', $uid)->get();
        $label_str = array();
        foreach ($labels as $label) {
            $label_str[] = $label->title;
        }
        return $label_str;
    }

    public static function get_lable_for_index($page_size = 5){
        $list = ArticleLabel::groupBy('label_id')->select(DB::Raw('count(*) as num'),'label_id')->orderBy('num','desc')->paginate($page_size);
        $label_ids = array();
        foreach ($list as $item){
            $label_ids[] = $item->label_id;
        }
        $labels = array();
        if(!empty($label_ids)){
            $list = Label::whereIn('label_id', $label_ids)->get();
            foreach($list as $item){
                $labels[] = $item->title;
            }
        }
        return $labels;
    }
}