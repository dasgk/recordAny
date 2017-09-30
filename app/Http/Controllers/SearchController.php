<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \XS;

class SearchController extends Controller
{
	/**
	 * 使用xunsearch 进行搜索
	 * @param $query 已经构造完成的查询语句
	 * @param $ini_file 配置的项目文件名称
	 * @param $attributes 需要返回的字段
	 */
	public function do_search($query, $ini_file, $attributes){
		$m = config_path($ini_file);
		$xs = new XS($m);
		$search = $xs->search; // 获取 搜索对象
		$search->setQuery($query)//按照chrono 正序排列
		->setLimit(20, 0);// 设置搜索语句, 分页, 偏移量
		$docs = $search->search(); // 执行搜索，将搜索结果文档保存在 $docs 数组中
		$count = $search->count(); // 获取搜索结果的匹配总数估算值
		$res = array();
		foreach ($docs as $doc) {
			foreach($attributes as $item){
				$s_item[$item] = $doc->$item;
			}
			$res[] = $s_item;
		}
		return $res;
	}

	public function article_title_content_search($key){
		echo '在标题和内容中搜索<br>';
		$res = $this->do_search($key,'search-article.ini', array('title','content'));
		var_dump($res);
	}

	public function user_search($key){
		echo '在用户中搜索<br>';
		$res = $this->do_search($key,'search-user.ini', array('nick_name'));
		var_dump($res);
	}

	public function demo_index(Request $request)
	{
		$key = $request->input('key');
		$this->article_title_content_search($key);
		$this->user_search($key);
	}
}
