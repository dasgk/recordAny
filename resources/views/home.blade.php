<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Ghost 开源博客平台 | Ghost中文网</title>
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href=" {{url('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('css/monokai_sublime.min.css')}}">
    <link href="{{url('css/magnific-popup.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('css/screen.css')}}"/>
    <script type="text/javascript" src="{{url('js/ghost-url.min.js')}}"></script>
</head>
<body class="home-template">

<!-- start header -->
<header class="main-header"
        style="background-image: url(http://static.ghostchina.com/image/6/d1/fcb3879e14429d75833a461572e64.jpg)"
">
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <!-- start logo -->
            <a class="branding" href="http://www.ghostchina.com" title="Ghost 开源博客平台"><img src="{{url('img/4f5566c1f7bc28b3f7ac1fada8abe.png')}}"  alt="Ghost 开源博客平台"></a>
            <!-- end logo -->
            <h2 class="text-hide">Ghost 是一个简洁、强大的写作平台。你只须专注于用文字表达你的想法就好，其余的事情就让 Ghost 来帮你处理吧。</h2>

            <img src="{{url('img/background.jpg')}}" alt="Ghost 博客系统"
                 class="hide">
        </div>
    </div>
</div>
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
                        <li role="presentation"><a href="{{url('/about')}}">关于</a></li>
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
                @foreach($article_list as $article)
                <article id=109 class="post tag-android tag-ke-hu-duan">

                    <div class="post-head">
                        <h1 class="post-title"><a href="{{url('articles/article_detail?id='.$article['article_id'])}}">{{$article['title']}}</a></h1>
                        <div class="post-meta">
                            <span class="author">作者：<a href="/user/info/{{$article['uid']}}/">{{$article['author']}}</a></span> &bull;
                            <time class="post-date" datetime="2017年11月8日星期三下午4点44分" title="2017年11月8日星期三下午4点44分">
                                {{$article['time']}}
                            </time>
                        </div>
                    </div>
                    @if(!empty($article['list_img']))
                        <div class="featured-media">
                            {!! $article['list_img'] !!}
                        </div>
                    @endif
                    <div class="post-content">
                        {!! $article['abstract'] !!}
                    </div>
                    <div class="post-permalink">
                        <a href="{{url('articles/article_detail?id='.$article['article_id'])}}" class="btn btn-default">阅读全文</a>
                    </div>

                    <footer class="post-footer clearfix">
                        <div class="pull-left tag-list">
                            <i class="fa fa-folder-open-o"></i>
                            @foreach($article['tags'] as $tag)
                                <a href="/tag/android/">{{$tag}}</a>,
                            @endforeach
                        </div>
                        <div class="pull-right share">
                        </div>
                    </footer>
                </article>
                @endforeach
                <nav class="pagination" role="navigation">
                    <span class="page-number">第 1 页 &frasl; 共 9 页</span>
                    <a class="older-posts" href="/page/2/"><i class="fa fa-angle-right"></i></a>
                </nav>
            </main>

            <aside class="col-md-4 sidebar">
                <div class="widget">
                    <h4 class="title">社区</h4>
                    <div class="content community">
                        <p>QQ群：277327792</p>
                        <p><a href="http://wenda.ghostchina.com/" title="Ghost中文网问答社区" target="_blank"
                              onclick="_hmt.push(['_trackEvent', 'big-button', 'click', '问答社区'])"><i
                                        class="fa fa-comments"></i> 问答社区</a></p>
                        <p><a href="http://weibo.com/ghostchinacom" title="Ghost中文网官方微博" target="_blank"
                              onclick="_hmt.push(['_trackEvent', 'big-button', 'click', '官方微博'])"><i
                                        class="fa fa-weibo"></i> 官方微博</a></p>
                    </div>
                </div>
                <div class="widget">
                    <h4 class="title">标签云</h4>
                    <div class="content tag-cloud">
                        <a href="/tag/ke-hu-duan/">客户端</a>
                        <a href="/tag-cloud/">...</a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="widget">
                    <h4 class="title">友链</h4>
                    <div class="content tag-cloud friend-links">
                        <a href="http://www.bootcss.com" title="Bootstrap中文网"
                           onclick="_hmt.push(['_trackEvent', 'link', 'click', 'Bootstrap中文网'])" target="_blank">Bootstrap中文网</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="widget">
                    <h4 class="title">标签云</h4>
                    <div class="content tag-cloud">
                        <a href="/tag/about-ghost/">Ghost</a>
                        <a href="/tag-cloud/">...</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="widget">
                    <h4 class="title">合作伙伴</h4>
                    <div class="content tag-cloud friend-links">
                        <a href="https://www.upyun.com/" title="又拍云"
                           onclick="_hmt.push(['_trackEvent', 'link', 'click', 'upyun'])" target="_blank">又拍云</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <span>Copyright &copy; <a href="http://www.ghostchina.com/">Ghost中文网</a></span> |
                <span><a href="http://www.miibeian.gov.cn/" target="_blank">京ICP备11008151号</a></span> |
                <span>京公网安备11010802014853</span>
            </div>
        </div>
    </div>
</div>

<a href="#" id="back-to-top"><i class="fa fa-angle-up"></i></a>

<script src="{{url('js/jquery.min.js')}}"></script>
<script src="{{url('js/bootstrap.min.js')}}"></script>
<script src="{{url('js/jquery.fitvids.min.js')}}"></script>
<script src="{{url('js/highlight.min.js')}}"></script>
<script src="{{url('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{url('js/main.js')}}"></script>
</body>
</html>
