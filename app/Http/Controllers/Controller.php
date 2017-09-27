<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


	/**
	 * 操作失败提示，无自动跳转
	 *
	 * @author lxp 20170204
	 * @param string $msg 提示消息，语言文件key
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
	 */
	protected function error($msg = '')
	{
		if (!$msg) {
			$msg = trans("msg.e_operate");
		} else {
			$msg = trans("msg.{$msg}") == "msg.{$msg}" ? $msg : trans("msg.{$msg}");
		}

		$returnData = [
			'status' => false,
			'msg' => $msg,
		];

		if (request()->ajax() || request('ajax') == 1) {
			return response()->json($returnData);
		} else {
			return view('showmsg', $returnData);
		}
	}


	/**
	 * 操作成功提示
	 *
	 * @author lxp 20170204
	 * @param string $redirect 需要跳转的地址
	 * @param string $msg 提示消息，语言文件key
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
	 */
	protected function success($redirect = '', $msg = '')
	{
		if (false == empty($redirect)) {
			$redirect = app(UrlGenerator::class)->previous();
		}

		if (!$msg) {
			$msg = trans("msg.s_operate");
		} else {
			$msg = trans("msg.{$msg}") == "msg.{$msg}" ? $msg : trans("msg.{$msg}");
		}

		$returnData = [
			'status' => true,
			'msg' => $msg,
			'url' => $redirect,
		];

		if (request()->ajax() || request('ajax') == 1) {
			return response()->json($returnData);
		} else {
			return view('showmsg', $returnData);
		}
	}
}
