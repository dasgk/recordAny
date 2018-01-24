<!DOCTYPE html>
<html lang="zh-CN">
<head>
    @extends('layout.header')
    <link rel="stylesheet" href=" {{url('css/comment.css')}}">
</head>
<body class="home-template">
<div class="fakeloader"></div>
<div id="body_content" STYLE="display: none">
<!-- start header -->
<header class="main-header"
        style="background-image: url({{url('img/header.jpg')}})"
        >

</header>
<!-- end header -->

<!-- start navigation -->
<nav class="main-navigation">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="navbar-header">
                        <span class="nav-toggle-button collapsed" data-toggle="collapse" data-target="#main-menu">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-bars"></i>
                        </span>
                </div>
                <div class="collapse navbar-collapse" id="main-menu">
                    <ul class="menu">
                        <li class="nav-current" role="presentation"><a href="/">首页</a></li>
                        <li role="presentation"><a href="{{url('user/profile')}}">个人中心</a></li>
                        <li role="presentation"><a href="/ghost-cheat-sheet/">关于</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- end navigation -->

<!-- start site's main content area -->
<section class="content-wrap">
    <div class="container">
        <div class="row">
            <main class="col-md-8 main-content">
                <article id=109 class="post tag-android tag-ke-hu-duan">
                    <div class="post-head">
                        <h1 class="post-title">{{$article['title']}}</h1>
                        <div class="post-meta">
                            <span class="author">作者：<a href="/user/info/{{$article['uid']}}/">{{$article['author']}}</a></span> &bull;
                            <time class="post-date" datetime="2017年11月8日星期三下午4点44分" title="2017年11月8日星期三下午4点44分">
                                {{$article['time']}}
                            </time>
                        </div>
                    </div>
                    <div class="post-content">
                        {!! htmlspecialchars_decode($article['content']) !!}
                    </div>

                    <footer class="post-footer clearfix">
                        <div class="pull-left tag-list">
                            <i class="fa fa-folder-open-o"></i>
                            @foreach($article['tags'] as $tag)
                                <a href="/tag/android/">{{$tag['title']}}</a>,
                            @endforeach
                        </div>
                        <div class="pull-right share">
                        </div>
                    </footer>
                    <div class="editormd editormd-vertical editormd-theme-white"
                         style="height:0%;border:0px solid #ddd;text-align:center">
                        @if($article['is_collected'])
                            <a href="javascript:void(0)" onclick="publish()" class="button button-action button-pill">取消赞</a>
                        @else
                            <a href="javascript:void(0)" onclick="publish()" class="button button-action button-pill">点赞</a>
                        @endif

                    </div>
                </article>
                <!--评论相关-->
                <div class="project">
                    <label>评论列表</label>
                    @foreach($comments as $item)
                    <div class="in2">
                        <div class="pl">
                            <div class="tx"><a href="http://www.jq22.com/mem750253"><img
                                            src="{{$item['avatar']}}"></a></div>
                            <ul class="plbg">
                                <div class="f"> {{$item['nick_name']}} <span class="jl">0</span></div>
                                <div class="r"><span class="z12">{{$item['created_at']}}</span></div>
                                <div class="dr"></div>
                            </ul>
                            <ul style="word-wrap: break-word;width: 100%">
                                <p> {!! $item['title'] !!}</p>
                                <div class="lyhf"></div>
                                <div class="dr"></div>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                    <!--对文章的回复  开始 -->
                    <div class="in2" >
                        <div class="pl" style="display: block;margin-left: 0%;width:100%">
                            <label>发表评论</label>
                            <textarea id='textarea2' style='height:150px; width:100%;'></textarea>
                            <button onclick="hftj()" type="button" class="btn btn-primary top10">回复</button>
                        </div>
                    </div>
                    <!--对文章的回复  结束 -->
                </div>
            </main>

            <aside class="col-md-4 sidebar">
                <div class="widget">
                    <h4 class="title">用户信息</h4>
                    <div class="content community">
                        <p>昵称：{{$article['author']}}</p>
                        <p>联系方式：{{$article['email']}}</p>
                    </div>
                </div>
                <div class="widget">
                    <h4 class="title">标签云</h4>
                    <div class="content tag-cloud">
                        @foreach($tags as $tag)
                            <a href="{{url('?label=').$tag['title']}}">{{$tag['title']}}</a>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>


@extends('layout.footer')

</body>
<script src="{{url('js/jquery.min.js')}}"></script>
<script src="{{url('js/bootstrap.min.js')}}"></script>
<script src="{{url('js/jquery.fitvids.min.js')}}"></script>
<script src="{{url('js/commentEditor.min.js')}}"></script>
<script src="{{url('js/highlight.min.js')}}"></script>
<script src="{{url('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{url('js/main.js')}}"></script>
<script src="{{url('js/ajax.js')}}"></script>
<script src="{{url('js/plugins/layer/layer.js')}}"></script>
<script>

</script>
<script>
    function hftj() {
        var jhf = document.getElementById("textarea2").value;
        jhf = jhf.replace(/<(script)[\S\s]*?\1>|style\=".+?"|title\=".+?"|class\=".+?"/gi, "");
        jhf = jhf.replace(/<p><br><\/p>|<p><\/p>/gi, "");
        jhf = jhf.replace(/<\/?([a-o]|[q-s]|[u-z])[^>]*>/gi, "");
        jhf = jhf.replace(/<\/?(textarea)[^>]*>/gi, "");
        var hfHTML = encodeURIComponent(jhf);
        if (hfHTML.length > 5) {
            var h = $.ajax({
                type: 'post',
                url: '{{url('articles/save_comments')}}',
                data: {content: jhf, _token:"{{csrf_token()}}",'article_id':"{{$article['article_id']}}"},
                cache: false,
                dataType: 'json',
                success: function (data) {
                    if(data.status == 405){
                        layer.msg('抱歉请先登录', function () {
                        });
                        return;
                    }else{
                        if(data.status == 0){
                            layer.msg(data.msg, function () {
                            });
                            return;
                        }else{
                            //成功
                            layer.msg(data.msg, function () {
                                window.location.reload();
                            });
                        }
                    }
                },
                error: function () {
                }
            });
        }
    }

    $(function () {
        var editor2 = $('#textarea2').wangEditor({
            'menuConfig': [
                ['insertCode', 'bold'],
                ['list', 'justify'],
                ['insertHr', 'undo']
            ]
        });
    });
    $(".hf").click(function () {
        pid = $(this).attr("name");
        $(".hf").css("padding-bottom", "10px");
        $(".huif").css({"top": $(this).offset().top - 30, "display": "block"});
        $(this).css("padding-bottom", "300px");
    });
    function callback(data) {
        if (data.status) {
            layer.msg(data.msg, function () {
                window.location.reload();
            });
        }
        layer.msg(data.msg, function () {
        });
    }
    function publish() {
        send_ajax("{{url('articles/like_article')}}", {
            'article_id': "{{$article['article_id']}}",
            '_token': "{{csrf_token()}}"
        }, 'post', callback);
    }
</script>
</body>
</html>
