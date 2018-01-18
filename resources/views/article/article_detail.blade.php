<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>点滴记录</title>
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href=" {{url('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href=" {{url('css/commentEditor.css')}}">
    <link rel="stylesheet" href=" {{url('css/comment.css')}}">
    <link rel="stylesheet" href="{{url('css/monokai_sublime.min.css')}}">
    <link rel="stylesheet" href="{{url('css/magnific-popup.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/screen.css')}}"/>
    <link rel="stylesheet" href=" {{url('css/buttons.css')}}">
    <script type="text/javascript" src="{{url('js/ghost-url.min.js')}}"></script>
</head>
<body class="home-template">

<!-- start header -->
<header class="main-header"
        style="background-image: url(http://static.ghostchina.com/image/6/d1/fcb3879e14429d75833a461572e64.jpg)">

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
                                <a href="/tag/android/">{{$tag}}</a>,
                            @endforeach
                        </div>
                        <div class="pull-right share">
                        </div>
                    </footer>
                    <div class="editormd editormd-vertical editormd-theme-white"
                         style="height:0%;border:0px solid #ddd;text-align:center">
                        <a href="javascript:void(0)" onclick="publish()" class="button button-action button-pill">点赞</a>
                    </div>
                </article>
                <!--评论相关-->


                <div class="project">
                    <label>评论列表</label>
                    <div class="in2">
                        <div class="pl">
                            <div class="tx"><a href="http://www.jq22.com/mem750253"><img
                                            src="http://www.jq22.com/tx/54.png"></a></div>
                            <ul class="plbg">
                                <div class="f"> MY朦胧的爱 <span class="jl">0</span></div>
                                <div class="r"><span class="z12">2018/1/18 12:01:30</span></div>
                                <div class="dr"></div>
                            </ul>
                            <ul style="word-wrap: break-word;width: 100%">
                                <p>&nbsp;大神&nbsp; 求分享 1510352122@qq.com 十分感谢&nbsp;</p>

                                <a class="hf" name="51342" style="padding-bottom: 10px;">回复</a>
                                <div class="lyhf"></div>
                                <div class="dr"></div>
                            </ul>
                        </div>

                        <div class="in2" >
                            <div id="err" class="alert alert-danger" role="alert" style="display:none"><i
                                        class="fa fa-smile-o"></i> 登录后才可以评论
                            </div>
                            <div id="err2" class="alert alert-warning" role="alert" style="display:none"><i
                                        class="fa fa-smile-o"></i> 30秒后在评论吧!
                            </div>
                            <textarea id='textarea1' style='height:200px; width:100%;'></textarea>

                            <div class="r top10">
                                <button onclick="getPlainTxt()" type="button" id="myButton"
                                        data-loading-text="Loading..." class="btn btn-primary" autocomplete="off">
                                    发表评论
                                </button>

                            </div>
                            <div class="dr"></div>
                        </div>
                        <!--对文章的回复  开始 -->
                        <hr>
                        <div class="pl" style="display: block">
                            <label>发表评论</label>
                            <textarea id='textarea2' style='height:150px; width:100%;'></textarea>
                            <button onclick="hftj()" type="button" class="btn btn-primary top10">回复</button>
                        </div>
                        <!--对文章的回复  结束 -->
                    </div>
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
                url: '/fyadd.aspx',
                data: {yy: pid, nr: hfHTML, ww: a},
                cache: false,
                dataType: 'text',
                success: function (data) {
                    if (data == "y") {
                        window.location.reload();
                    } else {
                        $("#err2").css("display", "block");
                        $("#err2").addClass("dou2");
                    }
                },
                error: function () {
                }
            });
        }
    }

    $(function () {
        var editor = $('#textarea1').wangEditor({
            'menuConfig': [
                ['insertCode', 'bold'],
                ['list', 'justify'],
                ['insertHr', 'undo']
            ]
        });
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
            layer.msg('+1', function () {
            });
            return;
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
