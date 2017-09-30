<?php

namespace App\Http\Controllers\PC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\ArticleModel;

class UserArticleController extends Controller
{


	private function get_article_list_by_own($uid)
	{
		$article_list = $this->get_article_list($uid);
	}

	private function get_article_list_by_other($uid)
	{
		$article_list = $this->get_article_list($uid);
	}

	/**
	 * 获得该用户的文章列表,同时自行判断是否是自己的文章列表
	 * @param Request $request
	 */
	public function index(Request $request)
	{
		$uid = $request->input('uid');
		if (Auth::check() && ($uid == Auth::user()->user_id)) {
			$article_list = $this->get_article_list_by_own($uid);
		} else {
			$article_list = $this->get_article_list_by_other($uid);
		}
	}
}