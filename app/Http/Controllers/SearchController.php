<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \XS;

class SearchController extends Controller
{
	public function do_search($query, $ini_file, $attributes){
		$m = config_path($ini_file);
		$xs = new XS($m);
		$search = $xs->search; // 获取 搜索对象
		$search->setQuery($query)//按照chrono 正序排列
		//$search
		->setLimit(20, 0);// 设置搜索语句, 分页, 偏移量
		$docs = $search->search(); // 执行搜索，将搜索结果文档保存在 $docs 数组中
		//var_dump($query);
		//var_dump($docs);
		$count = $search->count(); // 获取搜索结果的匹配总数估算值
		foreach ($docs as $doc) {
			echo $doc->rank() ;
			foreach($attributes as $item){
				echo $search->highlight($doc->$item)."  ";
			}
			echo $doc->percent() ;
			echo '<br>========<br>';
		}
		echo '总数:' . $count."<br>";
	}

	public function article_title_content_search($key){
		echo '在标题和内容中搜索<br>';
		$this->do_search($key,'search-article.ini', array('title','content'));
	}

	public function user_search($key){
		echo '在用户中搜索<br>';
		$this->do_search($key,'search-user.ini', array('nick_name'));
	}

	public function demo_index(Request $request)
	{
		$key = $request->input('key');
		$this->article_title_content_search($key);
		$this->user_search($key);
	}
}
