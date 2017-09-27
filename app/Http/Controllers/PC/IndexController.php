<?php

namespace App\Http\Controllers\PC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ArticleModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
	/**
	 * 网站首页
	 *
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index(Request $request)
	{
		return view('PC.index');
	}

	/**
	 * 显示QQ的登录页面
	 *
	 * @return mixed
	 */
	public function qq()
	{
		return Socialite::with('qq')->redirect();
	}

	/**
	 * qq登录成功回调函数
	 */
	public function qqlogin()
	{
		$user = Socialite::driver('qq')->user();
		dd($user);
	}

	/**
	 * 文章列表
	 *
	 * @author zjy 20170927
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function content()
	{
		$article_list = DB::table('article')->join('users', 'article.uid', '=', 'users.user_id')->orderBy('article.created_at', 'desc')->select('users.nick_name', 'article.updated_at', 'users.user_id', 'users.avatar', 'article.content', 'article.title', 'article.look_num', 'article.like_num', 'article.comment_num')->get();
		foreach ($article_list as $key => $item) {
			if (empty($item->avatar)) {
				$article_list[$key]->avatar = '/images/default_user.png';
			}
		}
		$avatar = '/images/default_user.png';
		if (Auth::check()) {
			$user = Auth::user();
			$avatar = $user->avatar;
			if (empty($avatar)) {
				$avatar = '/images/default_user.png';
			}
		}
		$info['article_list'] = $article_list;
		$info['avatar'] = $avatar;
		return view('PC.content', $info);
	}
}