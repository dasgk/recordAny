<?php

namespace App\ConstClass;

class TableStyleConst
{
	const ACTIVE = 'active';
	const SUCCESS = 'success';
	const WARNING = 'warning';
	const DANGER = 'danger';
	const INFO = 'info';
	public static $style_array = array(
		self::ACTIVE,
		self::SUCCESS,
		self::WARNING,
		self::DANGER,
		self::INFO
	);

	public static function get_random_style()
	{
		$num = rand(0, 4);
		return self::$style_array[$num];
	}
}