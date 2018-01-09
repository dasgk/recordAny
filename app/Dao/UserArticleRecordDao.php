<?php

namespace App\Dao;

use App\Models\UserArticleRecord;

class UserArticleRecordDao extends UserArticleRecord
{
    /**
     * 判断用户是否已经点赞过
     * @param $uid
     * @param $article_id
     * @return bool
     */
   public static function is_user_like_article($uid, $article_id){
       $record = self::where('uid', $uid)->where('article_id', $article_id)->where('type', ConstDao::TYPE_COLLECT)->first();
       return empty($record) ? false : true;
   }

   public static function user_like_article($uid, $article_id){
       $record = new UserArticleRecord();
       $record->uid = $uid;
       $record->article_id = $article_id;
       $record->type = ConstDao::TYPE_COLLECT;
       $record->save();
   }
}
