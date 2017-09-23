<?php

if (!function_exists('cdn')) {

	/**
	 * 统一处理资源文件路径，方面以后切换cdn
	 *
	 * @author lxp 20160616
	 * @param $path
	 * @return string
	 */
	function cdn($path)
	{
		return asset($path);
	}
}

function get_pwd($raw_pwd){
	$salt = env("SALT");
	return md5($raw_pwd.$salt);
}