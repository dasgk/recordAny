<?php

namespace App\Http\Controllers\PC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Model\ArticleModel;

class ArticleController extends Controller
{

	/**
	 * 展示文章页面
	 *
	 * @author zjy 20170927
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show_new_record(Request $request)
	{
		$aritcle_id = $request->input('article_id', 0);
		$article = ArticleModel::findOrNew($aritcle_id);
		return view('PC.article.index', array('article' => $article));
	}

	public function is_article_own($article, $user_id)
	{
		$res = true;
		if ($article->exists && $article->uid != $user_id) {
			$res = false;
		}
		return $res;
	}

	/**
	 * 保存文章
	 *
	 * @author zjy 20170927
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
	 */
	public function save_article(Request $request)
	{
		$title = request('title');
		$content = request('content');
		$validitor = Validator::make($request->all(), array(
			'title' => 'required',
			'content' => 'required',
		));
		if ($validitor->fails()) {
			$messages = $validitor->errors();
			$msg = $messages->first();
			return $this->error($msg);
		}
		$article_id = request('article_id');
		//判断该文章是否是自己的
		$uid = Auth::user()->user_id;
		$article = ArticleModel::findorNew($article_id);
		$is_right_authorize = $this->is_article_own($article, $uid);
		if(!$is_right_authorize){
			return $this->error('您没有修改权限');
		}
		$uid = Auth::user()->user_id;
		$article->uid = $uid;
		$article->title = $title;
		$article->content = $content;
		$article->save();
		return $this->success('', 'success');
	}
}
