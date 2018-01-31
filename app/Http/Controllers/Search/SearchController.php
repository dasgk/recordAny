<?php

namespace App\Http\Controllers\Search;

use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use XS;
use App\Dao\ConstDao;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    public function index()
    {
        $xs = new XS(config_path('record_search.ini'));
        $search = $xs->search; // 获取 搜索对象
        $query = request('key');
        $current_page = request('pageNum'); // 当前页
        $perPage = ConstDao::PER_PAGE_SIZE; //每页的记录数 ( 常量 )
        $orderBy = request('orderBy','updated_at');
        $search->setQuery($query)
            ->setSort($orderBy, true)//按照chrono 正序排列
            ->setLimit($perPage, ($current_page*$perPage)); // 设置搜索语句, 分页, 偏移量
        $docs = $search->search(); // 执行搜索，将搜索结果文档保存在 $docs 数组中
        $count = $search->count(); // 获取搜索结果的匹配总数估算值
        $res = array();
        foreach ($docs as $doc) {
            $article_id = $search->highlight($doc->article_id); // 高亮处理 subject 字段
            $article_model = Article::find($article_id);
            $uid = $article_model->uid;
            $user_model = Users::find($uid);
            $comment_count = ArticleComment::where('article_id', $article_id)->count();
            $title = $search->highlight($doc->title); // 高亮处理 subject 字段
            $content = $search->highlight($doc->content); // 高亮处理 message 字段
            $res[] = array('article_id' => $article_id, 'title' => $title, 'content' => $content, 'updated_at' => $doc->updated_at, 'look_num' => $article_model->look_num,
                'nick_name' => $user_model->nick_name, 'comment_count' => $comment_count);
        }
        $path = Paginator::resolveCurrentPath(); // 获取当前的链接"http://localhost/admin/account"
        $infoList['paginator'] = new LengthAwarePaginator($res, $count, $perPage, $current_page, [
            'path' => $path,  //设定个要分页的url地址。也可以手动通过 $paginator ->setPath(‘路径’) 设置
            'pageName' => 'page', //链接的参数名 http://localhost/admin/manage?page=2
        ]);
        return view('search.index', array('info' => $res, 'key' => $query, 'page' => $infoList,'orderBy'=>$orderBy));
    }
}
