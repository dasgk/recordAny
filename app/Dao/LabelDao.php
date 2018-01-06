<?php

namespace App\Dao;

use App\Models\ArticleComment;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Models\ArticleLabel;
use App\Models\Label;

class LabelDao extends Article
{
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

    public static function get_label_str_list_by_uid($uid)
    {
        $labels = self::where('uid', $uid)->get();
        $label_str = array();
        foreach ($labels as $label) {
            $label_str[] = $label->title;
        }
        return $label_str;
    }
}