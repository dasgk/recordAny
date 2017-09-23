<?php

namespace App\Dao;

use App\Model\UserModel;

class UserDao extends UserModel
{
	public static function get_all_users()
	{
		$users = UserModel::all();
		return $users;
	}
}