<?php

namespace App\Http\Controllers\User;

use App\Dao\AppUsersDao;
use App\Dao\UsersDao;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * 个人中心请求
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::User();
        $res['user'] = AppUsersDao::get_info_for_profile($user->uid);
        if(empty($user->comments)){
            $user->comments = '这家伙很懒，啥也没写...';
        }
        $types = config('tab_type');
        $res['types'] = $types;
        return view('user.profile', $res);
    }

    /**
     * 修改个人简介
     */
    public function modify_comments(){
        $user = Auth::User();
        $res['user'] = $user;
        $comments = request('comments');
        $user->comments = $comments;
        $user->save();
    }

    /**
     * 修改用户昵称
     */
    public function modify_nick_name(){
        $user = Auth::User();
        $res['user'] = $user;
        $nick_name = request('nick_name');
        $user->nick_name = $nick_name;
        $user->save();
    }
}