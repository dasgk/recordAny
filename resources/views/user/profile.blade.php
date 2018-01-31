<!DOCTYPE html>
<html lang="zh-CN">
<head>
    @extends('layout.header')
</head>
<body class="home-template">
<div class="fakeloader"></div>
<div id="body_content" STYLE="display: none">
    <header class="main-header"
            style="background-image: url({{url('img/header.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <!-- start logo -->
                    <a class="branding" href="http://www.ghostchina.com" title="Ghost 开源博客平台"><img
                                src="{{url('img/4f5566c1f7bc28b3f7ac1fada8abe.png')}}" alt="Ghost 开源博客平台"></a>
                    <!-- end logo -->
                    <h2 class="text-hide">Ghost 是一个简洁、强大的写作平台。你只须专注于用文字表达你的想法就好，其余的事情就让 Ghost 来帮你处理吧。</h2>

                    <img src="{{url('img/background.jpg')}}" alt="Ghost 博客系统"
                         class="hide">
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->
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
                            <li role="presentation"><a href="/">首页</a></li>
                            <li class="nav-current" role="presentation"><a href="{{url('user/profile')}}">个人中心</a></li>
                            <li role="presentation"><a href="{{url('/about')}}">关于</a></li>
                            <li role="presentation"><a href="{{url('/search/index')}}">搜索</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <section class="content-wrap">
        <div class="container">
            <div class="row">
                <main class="col-md-8 main-content">
                    <div class="main">
                        <div class="persional_property">
                            <div class="person_info_con"><i class="icon-edit icon-large person-info-edit"></i><a
                                        name="M_base"></a>
                                <dl class="person-photo">
                                    <dt><a href="javascript:;">
                                            <img src="{{$user['avatar'] or url('img/default_avatar.jpg')}}"
                                                 class="header"><span class="edit_person_pic"></span>
                                        </a>
                                    </dt>
                                    <dd class="focus_num"><b><a href="javajscript:void(0)"
                                                                target="_blank">{{$user['article_num']}}</a></b>文章
                                    </dd>
                                    <dd class="fans_num"><b><a href="/my/fans"
                                                               target="_blank">{{$user['friend_num']}}</a></b>互动
                                    </dd>
                                </dl>
                                <dl class="person-info">
                                    <dt class="person-nick-name"> {{$user['nick_name']}}</dt>
                                    <dd class="person-sign">个人简介</dd>
                                    <dd style="margin: 10px 0px">
                                        <div class="person-status">
                                            {{$user['comments']}}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div>
                            <ul class="my_tab_ul">
                                @foreach($types as $key=>$v)
                                    @if($key == 'blogs')
                                        <li id="{{$key}}" data-modal="{{$key}}"
                                            class="my_tab_li current_detail">{{$v}}</li>
                                    @else
                                        <li id="{{$key}}" data-modal="{{$key}}" class="my_tab_li">{{$v}}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div id="my_articles" style="background-color:white">
                        </div>
                        <div id="my_comments" style="background-color:white"></div>
                        <div id="my_friends" style="background-color:white"></div>
                        <div id="my_collects" style="background-color:white"></div>
                    </div>
                </main>
                <aside class="col-md-4 sidebar">
                    <div class="widget">
                        <div style="margin:0 30%">
                            <a class="btn btn-default" href="{{url('articles/')}}">发表新文章</a>
                        </div>
                    </div>
                    <div class="widget">
                        <h4 class="title">标签云</h4>
                        <div class="content tag-cloud">
                            @foreach($labels as $label)
                                <a href="javascript:void(0)">{{$label}}</a>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    @extends('layout.footer')
    <script src="{{url('js/jquery.min.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="{{url('js/jquery.fitvids.min.js')}}"></script>
    <script src="{{url('js/highlight.min.js')}}"></script>
    <script src="{{url('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{url('js/main.js')}}"></script>
    <script src="{{url('js/ajax.js')}}"></script>
    <script src="{{url('js/write_profile.js')}}"></script>
    <script>
        types = [];
        @foreach($types as $key=>$type)
            types.push("{{$key}}")
        @endforeach
        function clear_table() {
            for (type in types) {
                var_id = "#my_" + types[type];
                $(var_id).hide();
                $(var_id).html('');
            }
        }
        var select_type = '';
        function fill_table(raw_data) {
            clear_table();
            //raw_data = raw_data.data;
            data = raw_data.data;
            type = raw_data.data.type;
            var_id = "#my_" + select_type;
            content_list = data.data.data;
            header = data.data.header;
            //填充头部
            str = "<table class='table table-responsive'> <thead><tr>";
            for (item in header) {
                str += "<td style=\"line-height:3.428571\">" + header[item] + "</td>"
            }
            str += "</tr></thead><tbody>";
            //填充内容
            for (item in content_list) {
                str += "<tr>";
                //每行加一个超链接
                for (mm in content_list[item]) {
                    if (mm == 'title' && type == 'article') {
                        str += "<td style=\"line-height:3.428571\"><a href='../" + select_type + "?id=" + content_list[item]['id'] + "'>" + content_list[item][mm] + "</a></td>";
                    } else {
                        if (mm == 'title' && (type == 'collect' || type == 'comment')) {
                            str += "<td style=\"line-height:3.428571\"><a href='../articles/article_detail" + "?id=" + content_list[item]['id'] + "'>" + content_list[item][mm] + "</a></td>";
                        } else {
                            str += "<td style=\"line-height:3.428571\">" + content_list[item][mm] + "</td>";
                        }
                    }
                }
                str += "</tr>";
            }
            str += "</tbody></table>";
            $(var_id).show();
            $(var_id).html(str);
        }
        function change_type(type) {
            var tabs = $(".my_tab_li");
            for (var i = 0; i < tabs.length; i++) {
                $(tabs[i]).attr('class', 'my_tab_li');
            }
            $("#" + type).attr('class', 'my_tab_li current_detail');
            select_type = type;
            send_ajax("{{url('user/get_info_list')}}", {'type': type}, 'get', fill_table);
        }
        $(function () {
            @if(!empty(Auth::user()) &&(Auth::user()->uid == $user['uid']))
            $(".person-nick-name").click(function () {
                var clickObj = $(this);
                content = clickObj.html();
                content = content.replace(/\s/g, '')
                changeToEditforNickName(clickObj);
            });
            $(".person-status").click(function () {
                var clickObj = $(this);
                content = clickObj.html();
                content = content.replace(/\s/g, '')
                changeToEditforComments(clickObj);
            })
            @endif
            //页面加载时得到最新的信息列表
            $(".my_tab_li").click(function () {
                type = $(this).attr('data-modal');
                change_type(type);
            })
            change_type('articles');
        });
    </script>
</body>
</html>