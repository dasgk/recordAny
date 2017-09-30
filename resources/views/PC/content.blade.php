<!DOCTYPE html>
<html><!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <title>简书 - 创作你的创作</title>
    <link rel="stylesheet" media="all" href="{{asset('css/web-12a5f8fcc34535aa91de.css')}}">
    <link rel="stylesheet" media="all" href="{{asset('css/entry-7642b94e17df29096c13.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
    <link rel="icon" href="{{asset('images/logo.jpg')}}" type="image/x-icon">
</head>

<body lang="zh-CN" class="reader-black-font">
<!-- 全局顶部导航栏 -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="width-limit">
        <!-- 左上方 Logo -->
        <a class="logo" href="http://www.jianshu.com/"><img src="{{asset('images/logo.jpg')}}" alt="Logo"></a>
        <!-- 右上角 -->
        <!-- 登录显示写文章 -->
        <a class="btn write-btn" href="{{'/show_new_record?p=c'}}">
            <i class="glyphicon glyphicon-edit"></i>写文章
        </a>
        <!-- 如果用户登录，显示下拉菜单 -->
        <div class="user">
            <div data-hover="dropdown">
                <a class="avatar" href="http://www.jianshu.com/u/470804248757"><img src="{{$avatar}}" alt="120"></a>
            </div>
            <ul class="dropdown-menu">
                <li>
                    <a href="http://www.jianshu.com/u/470804248757">
                        <i class="iconfont ic-navigation-profile"></i><span>我的主页</span>
                    </a></li>
                <li>
            </ul>
        </div>
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="nav navbar-nav">
                    <ul class="dropdown-menu">
                        <li><a href="http://www.jianshu.com/notifications#/comments"><i class="iconfont ic-comments"></i> <span>评论</span> <!----></a></li>
                        <li><a href="http://www.jianshu.com/notifications#/chats"><i class="iconfont ic-chats"></i> <span>简信</span> <!----></a></li>
                        <li><a href="http://www.jianshu.com/notifications#/requests"><i class="iconfont ic-requests"></i> <span>投稿请求</span> <!----></a></li>
                        <li><a href="http://www.jianshu.com/notifications#/likes"><i class="iconfont ic-likes"></i> <span>喜欢和赞</span> <!----></a></li>
                        <li><a href="http://www.jianshu.com/notifications#/follows"><i class="iconfont ic-follows"></i> <span>关注</span> <!----></a></li>
                        <li><a href="http://www.jianshu.com/notifications#/money"><i class="iconfont ic-money"></i> <span>赞赏</span> <!----></a></li>
                        <li><a href="http://www.jianshu.com/notifications#/others"><i class="iconfont ic-others"></i> <span>其他消息</span> <!----></a></li>
                    </ul>
                    </li>
                    <li class="search">
                        <form  action="{{url('/search/demo')}}" accept-charset="UTF-8" method="get" id="search_form"><input name="utf8" type="hidden" >
                            <input type="text" name="key" id="q" value="" autocomplete="off" width="50" placeholder="用户昵称，文章标题或者内容" class="search-input">
                            <a class="search-btn" href="javascript:submit_search();" style="margin-top:3%"><i class="glyphicon glyphicon-search"></i></a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="container index">
    <div class="row">
        <!-- Banner -->
        <div id="indexCarousel" class="carousel slide">
            <div class="carousel-inner">
            </div>
            <a class="left carousel-control" href="http://www.jianshu.com/#indexCarousel" role="button" data-slide="prev"><i class="iconfont ic-previous-s"></i></a>
            <a class="right carousel-control" href="http://www.jianshu.com/#indexCarousel" role="button" data-slide="next"><i class="iconfont ic-next-s"></i></a>
        </div>
        <!-- Banner -->
        <div class="col-xs-16 main">
            <div class="recommend-collection">
            </div>
            <div class="split-line"></div>
            <div id="list-container">
                <!-- 文章列表模块 -->
                <ul class="note-list" infinite-scroll-url="/">
                    @foreach($article_list as $item)
                        <li id="note-17274472" data-note-id="17274472" class="have-img">
                            <a class="wrap-img" href="http://www.jianshu.com/p/2b234e1630d8" target="_blank">
                                <img class="img-blur-done" src="{{asset('images/default_list.jpg')}}" alt="120">
                            </a>
                            <div class="content">
                                <div class="author">
                                    <a class="avatar" target="_blank" href="{{url('user/center?p=c&uid='.$item->user_id)}}">
                                        <img src="{{$item->avatar}}" alt="64">
                                    </a>
                                    <div class="name">
                                        <a class="blue-link" target="_blank" href="http://www.jianshu.com/u/546f95e0a658">{{$item->nick_name}}</a>
                                        <span class="time" data-shared-at="2017-09-19T19:29:55+08:00">{{$item->updated_at}}</span>
                                    </div>
                                </div>
                                <a class="title" target="_blank" href="http://www.jianshu.com/p/2b234e1630d8">{{$item->title}}</a>
                                <p class="abstract">
                                    {{$item->content}}
                                </p>
                                <div class="meta">
                                    <a class="collection-tag" target="_blank" href="http://www.jianshu.com/c/fcd7a62be697">世间事</a>
                                    <a target="_blank" href="http://www.jianshu.com/p/2b234e1630d8">
                                        <i class="glyphicon glyphicon-eye-open"></i>{{$item->look_num}}
                                    </a>
                                    <a target="_blank" href="http://www.jianshu.com/p/2b234e1630d8#comments">
                                        <i class="glyphicon glyphicon-thumbs-up"></i> {{$item->like_num}}
                                    </a> <span><i class="glyphicon glyphicon-comment"></i> {{$item->comment_num}}</span>
                                </div>
                            </div>
                            @endforeach
                        </li>
                </ul>
                <!-- 文章列表模块 -->
            </div>
        </div>
        <div class="col-xs-7 col-xs-offset-1 aside">
            <div class="board">
            </div>
        </div>
    </div>
</div>
</body>
<script>
    function submit_search() {
        document.getElementById('search_form').submit();
    }
</script>
</html>