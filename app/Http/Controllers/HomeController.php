<?php

namespace App\Http\Controllers;

use App\Dao\ArticleCommentDao;
use App\Dao\ArticleDao;
use App\Dao\LabelDao;
use App\Dao\ConstDao;
use App\Models\Article;
use App\Models\IPStat;
use App\Models\Label;
use App\Models\PvStat;
use App\Models\UvStat;
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
        $label = request('label');
        $label_id = 0;
        if(!empty($label)){
            $article_ids = LabelDao::get_article_ids_by_label($label);
            $count =count($article_ids);
            $article_raw_list = Article::whereIn('article_id',$article_ids)->orderBy('article_id', 'desc')->paginate(ConstDao::PER_PAGE_SIZE);
            $label_modal = Label::where('title','like',"%".$label."%")->first();
            if(!empty($label_modal)){
                $label_id = $label_modal->label_id;
            }
        }else{
            $count = Article::orderBy('look_num', 'desc')->count();
            $article_raw_list = Article::orderBy('look_num', 'desc')->orderBy('article_id', 'desc')->paginate(ConstDao::PER_PAGE_SIZE);
        }

        $article_list = ArticleDao::get_article_list_for_index($article_raw_list);
        $infoList['tags'] = LabelDao::get_lable_for_index();
        $total = $count; //记录总条数
        $perPage = ConstDao::PER_PAGE_SIZE; //每页的记录数 ( 常量 )
        $current_page = request('pageNum'); // 当前页
        $path = Paginator::resolveCurrentPath(); // 获取当前的链接"http://localhost/admin/account"
        $infoList['label_id'] = $label_id;
        $infoList['retData'] = $article_list;
        $infoList['paginator'] = new LengthAwarePaginator($article_list, $total, $perPage, $current_page, [
            'path' => $path,  //设定个要分页的url地址。也可以手动通过 $paginator ->setPath(‘路径’) 设置
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

    public function getIp()
    {

        if(!empty($_SERVER["HTTP_CLIENT_IP"]))
        {
            $cip = $_SERVER["HTTP_CLIENT_IP"];
        }
        else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
        {
            $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        else if(!empty($_SERVER["REMOTE_ADDR"]))
        {
            $cip = $_SERVER["REMOTE_ADDR"];
        }
        else
        {
            $cip = '';
        }
        preg_match("/[\d\.]{7,15}/", $cip, $cips);
        $cip = isset($cips[0]) ? $cips[0] : 'unknown';
        unset($cips);

        return $cip;
    }

    /**
     * 统计
     */
    public function stat()
    {
        $url = request('url');
        $cookie = request('cookie');
        //PV统计的话，每小时作为一个记录
        $hour = date("Y-m-d H:00:00", time());
        $stat = PvStat::where('url', $url)->where('stat_time', $hour)->first();
        if (empty($stat)) {
            $stat = new PvStat();
            $stat->url = $url;
            $stat->stat_time = $hour;
            $num = 0;
        } else {
            $num = $stat->num;
        }
        $num++;
        $stat->url = $url;
        $stat->num = $num;
        $stat->save();
        //UV统计
        $stat = UvStat::where('url', $url)->where('stat_time', $hour)->where('cookie', $cookie)->first();
        if (empty($stat)) {
            $stat = new UvStat();
            $stat->url = $url;
            $stat->cookie = $cookie;
            $stat->stat_time = $hour;
            $num = 0;
        } else {
            $num = $stat->num;
        }
        $num++;
        $stat->url = $url;
        $stat->num = $num;
        $stat->save();
        //ip统计
        $stat = IPStat::where('url', $url)->where('stat_time', $hour)->where('ip', $this->getIp())->first();
        if (empty($stat)) {
            $stat = new IPStat();
            $stat->ip = $this->getIp();
            $stat->url = $url;
            $stat->stat_time = $hour;
            $num = 0;
        } else {
            $num = $stat->num;
        }
        $num++;
        $stat->url = $url;
        $stat->num = $num;
        $stat->save();
    }
}
