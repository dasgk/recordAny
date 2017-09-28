<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \XS;

class SearchController extends Controller
{
	public function demo_index(Request $request)
	{
		$key = $request->input('key');
		$m = config_path('search-demo.ini');
		$xs = new XS($m);
		$search = $xs->search; // 获取 搜索对象
		$search->setQuery($key)//按照chrono 正序排列
		->setLimit(20, 0);// 设置搜索语句, 分页, 偏移量
		$docs = $search->setFuzzy()->search($key); // 执行搜索，将搜索结果文档保存在 $docs 数组中
		$count = $search->count(); // 获取搜索结果的匹配总数估算值
		foreach ($docs as $doc) {
			$subject = $search->highlight($doc->title); // 高亮处理 subject 字段
			$message = $search->highlight($doc->content); // 高亮处理 message 字段
			echo $doc->rank() . '. ' . $subject . " [" . $doc->percent() . "%] - ";
			echo "<br>" . $message . "<br>";
			echo '<br>========<br>';
		}
		echo '总数:' . $count;
	}
}
