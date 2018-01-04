<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Ghost 开源博客平台 | Ghost中文网</title>
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href=" {{url('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('css/monokai_sublime.min.css')}}">
    <link rel="stylesheet" href="{{url('css/persion_space_A.css')}}">
    <link rel="stylesheet" href="{{url('css/common_person.css')}}">
    <link href="{{url('css/magnific-popup.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('css/screen.css')}}"/>
    <script type="text/javascript" src="{{url('js/ghost-url.min.js')}}"></script>
</head>
<body class="home-template">

<!-- start header -->
<header class="main-header"
        style="background-image: url(http://static.ghostchina.com/image/6/d1/fcb3879e14429d75833a461572e64.jpg)">
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
                        <li role="presentation"><a href="/">首页</a></li>
                        <li class="nav-current" role="presentation"><a href="{{url('user/profile')}}">个人中心</a></li>
                        <li role="presentation"><a href="/ghost-cheat-sheet/">关于</a></li>
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
                                <dd class="focus_num"><b><a href="/my/follow"
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
                                    <li id="{{$key}}" data-modal="{{$key}}" class="my_tab_li current_detail">{{$v}}</li>
                                @else
                                    <li id="{{$key}}" data-modal="{{$key}}" class="my_tab_li">{{$v}}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div id="my_blogs" style="background-color:white">
                    </div>
                    <div id="my_comments" style="background-color:white"></div>
                    <div id="my_friends" style="background-color:white"></div>
                    <div id="my_collects" style="background-color:white"></div>
                </div>
            </main>
            <aside class="col-md-4 sidebar">
                <div class="widget">
                    <div style="margin:0 30%">
                        <button class="btn btn-default">发表新文章</button>
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
<script src="{{url('js/jquery.min.js')}}"></script>
<script src="{{url('js/bootstrap.min.js')}}"></script>
<script src="{{url('js/jquery.fitvids.min.js')}}"></script>
<script src="{{url('js/highlight.min.js')}}"></script>
<script src="{{url('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{url('js/main.js')}}"></script>
<script src="{{url('js/ajax.js')}}"></script>
<script>
    types = [];
    @foreach($types as $key=>$type)
        types.push("{{$key}}")
    @endforeach
    function changeToEditforComments(node) {
        node.html("");
        var inputObj = $("<textarea /> </textarea>");
        inputObj.css("border", "1").css("background-color", node.css("background-blue"))
            .css("font-size", "24px").css("height", "90px")
            .css("width", "490px").val(content).appendTo(node)
            .get(0).select();
        inputObj.click(function () {
            return false;
        }).keyup(function (event) {
            var keyvalue = event.which;
            if (keyvalue == 13) {
                node.html(node.children("textarea").val());
            }
            if (keyvalue == 27) {
                node.html(content);
            }
        }).blur(function () {
            if (node.children("textarea").val() != content) {
                if (confirm("是否保存修改的内容？", "Yes", "No")) {
                    send_ajax("{{url('user/modify_comments')}}", {
                        'comments': node.children("textarea").val(),
                        "_token": "{{csrf_token()}}"
                    }, 'POST', success);
                } else {
                    node.html(content);
                }
            } else {
                node.html(content);
            }
        });
    }
    function changeToEditforNickName(node) {
        node.html("");
        var inputObj = $("<input type='text'/>");
        inputObj.css("border", "1").css("background-color", node.css("background-blue"))
            .css("font-size", node.css("font-size")).css("height", "50px")
            .css("width", node.css("width")).val(content).appendTo(node)
            .get(0).select();
        inputObj.click(function () {
            return false;
        }).keyup(function (event) {
            var keyvalue = event.which;
            if (keyvalue == 13) {
                node.html(node.children("input").val());
            }
            if (keyvalue == 27) {
                node.html(content);
            }
        }).blur(function () {
            if (node.children("input").val() != content) {
                if (confirm("是否保存修改的内容？", "Yes", "No")) {
                    send_ajax("{{url('user/modify_nick_name')}}", {
                        'nick_name': node.children("input").val(),
                        "_token": "{{csrf_token()}}"
                    }, 'POST', success);
                } else {
                    node.html(content);
                }
            } else {
                node.html(content);
            }
        });
    }
    function success() {
    }
    function clear_table() {
        for (type in types) {
            var_id = "#my_" + types[type];
            $(var_id).hide();
            $(var_id).html('');
        }
    }
    var select_type = '';
    function fill_table(data) {
        clear_table();
        var_id = "#my_" + select_type;
        content_list = data.data.data;
        header = data.data.header;
        //填充头部
        str = "<table class='table'> <thead><tr>";
        for (item in header) {
            str += "<td>" + header[item] + "</td>"
        }
        str += "</tr></thead><tbody>";
        //填充内容
        for (item in content_list) {
            str += "<tr>";
            for (mm in content_list[item]) {
                str += "<td>" + content_list[item][mm] + "</td>";
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
        //页面加载时得到最新的信息列表
        $(".my_tab_li").click(function () {
            type = $(this).attr('data-modal');
            change_type(type);
        })
        change_type('blogs');
    });
</script>
</body>
</html>