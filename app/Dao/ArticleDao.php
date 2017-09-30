<?php

namespace App\Dao;

use \App\Model\ArticleModel;

class ArticleDao extends ArticleModel
{
	/**
	 * @param $uid  特定用户的文章列表
	 * @param $is_own 是否是自己的文章列表，控制某些对外接口
	 * @return mixed
	 */
	static function get_article_list($uid, $is_own)
	{
		$article_list = ArticleModel::where('uid', $uid)->get();
		$res = array();
		foreach ($article_list as $item) {
			$ar_item = array();
			$ar_item['title'] = $item->title;
			$ar_item['content'] = $item->content;
			$ar_item['updated_at'] = $item->updated_at;
			$ar_item['look_num'] = $item->look_num;
			$ar_item['like_num'] = $item->like_num;
			$ar_item['is_own'] = 0;
			if($is_own){
				$ar_item['is_own'] = 1;
			}
			$res[] = $ar_item;
		}
		return $res;
	}
}

