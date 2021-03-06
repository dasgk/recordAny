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

    /**
     * 添加收藏记录
     * @param $uid
     * @param $article_id
     */
   public static function user_like_article($uid, $article_id){
       $record = new UserArticleRecord();
       $record->uid = $uid;
       $record->article_id = $article_id;
       $record->type = ConstDao::TYPE_COLLECT;
       $record->save();
   }

    /**
     * 删除收藏记录
     * @param $uid
     * @param $article_id
     */
   public static function user_dislike_article($uid, $article_id){
       UserArticleRecord::where('uid', $uid)->where('article_id', $article_id)->where('type', ConstDao::TYPE_COLLECT)->delete();
   }
}
