<?php

namespace App\Http\Controllers\Article;

use App\Dao\AppUsersDao;
use App\Dao\ArticleCommentDao;
use App\Dao\ArticleDao;
use App\Dao\LabelDao;
use App\Dao\UsersDao;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleLabel;
use App\Models\Label;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller
{
    /**
     * 展示文章编辑页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function new_article()
    {
        $article_id = request('id', 0);
        $res['article_id'] = $article_id;
        $res['tags'] = LabelDao::get_label_str_list_by_article_id($article_id);
        $article =  Article::where('article_id', $article_id)->first();
        if(empty($article)){
            $article = new Article();
        }
        $res['article'] =$article;
        return view('article.article', $res);
    }

    /**
     * 保存文章信息接口
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function save_article()
    {
        $uid = Auth::user()->uid;
        $id = request('id');
        $id = intval($id);
        $title = request('title');
        $content = request('content');
        $labels = request('labels');
        $article = Article::find($id);
        if (empty($article)) {
            $article = new Article();
        }
        $article->title = $title;
        $article->content = htmlspecialchars($content);
        $article->uid = $uid;
        $article->save();
        //处理标签
        $labels = explode(',', $labels);
        $label_ids = array();
        foreach ($labels as $label) {
            $label = trim($label);
            $label_model = Label::where('uid', $uid)->where('title', $label)->first();
            if (empty($label_model)) {
                $label_model = new Label();
            }
            $label_model->uid = $uid;
            $label_model->title = $label;
            $label_model->save();
            $label_ids[] = $label_model->label_id;
        }
        //处理文章标签
        $id = $article->article_id;
        foreach ($label_ids as $label_id) {
            $label_relative = ArticleLabel::where('label_id', $label_id)->where('article_id', $id)->first();
            if (empty($label_relative)) {
                $label_relative = new ArticleLabel();
            }
            $label_relative->article_id = $id;
            $label_relative->label_id = $label_id;
            $label_relative->save();
        }
        return $this->success('保存成功');
    }
}