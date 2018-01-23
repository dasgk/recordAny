<?php

namespace App\Http\Controllers;

use App\Dao\ArticleCommentDao;
use App\Dao\ArticleDao;
use App\Dao\LabelDao;
use App\Dao\ConstDao;
use App\Models\Article;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = Article::orderBy('look_num', 'desc')->count();
        $article_raw_list = Article::orderBy('look_num', 'desc')->orderBy('article_id', 'desc')->paginate(ConstDao::PER_PAGE_SIZE);
        $article_list = ArticleDao::get_article_list_for_index($article_raw_list);
        $infoList['tags'] = LabelDao::get_lable_for_index();
        $total = $count; //记录总条数
        $perPage = ConstDao::PER_PAGE_SIZE; //每页的记录数 ( 常量 )
        $current_page = request('pageNum'); // 当前页
        $path = Paginator::resolveCurrentPath(); // 获取当前的链接"http://localhost/admin/account"
        $infoList['retData'] = $article_list;
        $infoList['paginator'] = new LengthAwarePaginator($article_list, $total,$perPage, $current_page, [
            'path' => $path ,  //设定个要分页的url地址。也可以手动通过 $paginator ->setPath(‘路径’) 设置
            'pageName' => 'page', //链接的参数名 http://localhost/admin/manage?page=2
        ]);

        return view('home', $infoList);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('about');
    }
}
