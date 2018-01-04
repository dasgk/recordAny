<?php

namespace App\Dao;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;

class UserArticleRecordDao extends UserArticleRecord
{


    private static function get_user_info_by_comments($uid){
        $uids = self::get_uids_by_comments($uid);
        return AppUsersDao::get_info_for_profile($uids);
    }

}
