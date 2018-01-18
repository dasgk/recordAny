

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>基于bootstrap实现的后台框架</title>
    <meta name="description" content="基于bootstrap实现的后台框架" />
    <meta name="keywords" content="bootstrap后台框架,bootstrap模版，bootstrap框架,jquery,jquery插件" />
    <meta name="author" content="jQuery插件库" />
    <meta name="Copyright" content="jQuery插件库" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <link rel="Shortcut icon" href="http://www.jq22.com/favicon.ico" />
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="//cdn.bootcss.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="/css/wangEditor.css">
    <link rel="stylesheet" type="text/css" href="/css/pifu.css">
    <link rel="stylesheet" href=" {{url('css/commentEditor.css')}}">
    <link rel="stylesheet" href=" {{url('css/comment.css')}}">
    <link rel="stylesheet" href=" {{url('css/pifu.css')}}">

    <style>
        .affix{display:block;margin-top:40px;-webkit-animation:fadeInDown 1s .2s ease both;-moz-animation:fadeInDown 1s .2s ease both;}@-webkit-keyframes fadeInDown{0%{opacity:0;-webkit-transform:translateY(-20px)}100%{opacity:1;-webkit-transform:translateY(0)}}@-moz-keyframes fadeInDown{0%{opacity:0;-moz-transform:translateY(-20px)}100%{opacity:1;-moz-transform:translateY(0)}}
        .dz {font-size:14px;padding-left:10px;font-family:Vrinda;color:#666666}
        .dzs {color:#91ab4e;padding-left:5px;}
        .inad {background-image: url(img/inadbg.png);background-repeat: no-repeat;background-position: 0% 650px;}
        @media screen and (max-width:1000px){
            .inad {background-image: none;}
        }.jcjg{border: 1px solid #c3e4b4;box-sizing: border-box;cursor:auto}.project-content table {margin-bottom: 20px}
    </style>
    <script src="/js/jquery.min.js"></script>
    <!--[if lt IE 9]>
    <script src="/js/respond.min.js"></script>
    <script src="/js/html5shiv.min.js"></script>
    <![endif]-->
    <link href="/css/my.css" rel="stylesheet" media="screen">
    <script>var n = 1;</script>
</head>
<body data-spy="scroll" data-target=".navbar-example">
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-logo" href="http://www.jq22.com/"><img src="http://www.jq22.com/img/logo.png" height="100%" alt="jQuery插件,jQuery,jQuery特效.jQuery ui,jQuery 教程,css3,网页特效,JS特效"></a> </div>
        <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right">
                <li ><a href="http://www.jq22.com/daima"><i class="fa fa-code"></i> &nbsp;在线代码</a></li>
                <li ><a href="http://www.jq22.com/textDifference"><i class="fa fa-balance-scale" aria-hidden="true"></i> &nbsp;文本比较</a></li>
                <li ><a href="http://www.jq22.com/jquery-info122"><i class="fa fa-download"></i> &nbsp;jQuery下载</a></li>
                <li><a href="http://www.jq22.com/jquery/jquery.html" target="_blank"><i class="fa fa-ship" aria-hidden="true"></i> &nbsp;前端库</a></li>
                <li><a href="http://www.jq22.com/chm/jquery/index.html" target="_blank"><i class="fa fa-book"></i> &nbsp;在线手册</a></li>
                <li class="dropdown"><a rel="nofollow" href="http://weibo.com/jq22" target="_blank"><i class="fa fa-weibo"></i> &nbsp;微博</a></li>
                <li >

                    <a href="#" data-toggle="modal" data-target="#myModal" >
                        <i class="fa fa-user"></i> &nbsp;注册/登录<span class="sr-only">(current)</span></a>

                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
<!--end nav-->
<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content2 tcc">
            <div class="modal-header2 top20">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">

                </h4>
            </div>
            <div class="modal-body tcck">
                <div class="input-group input-group-lg parentCls">
                    <span class="input-group-addon" id="email"><i class="fa fa-envelope-o"></i></span>
                    <input type="text" class="form-control inputElem" placeholder="请输入登录邮箱" aria-describedby="email" id="ema" style="width: 466px;">
                </div>
                <div class="input-group input-group-lg top20">
                    <span class="input-group-addon" id="pwd"><i class="fa fa-unlock-alt" style="width:18px"></i></span>
                    <input type="password" class="form-control" placeholder="请输入登录密码" aria-describedby="pwd" id="pw">
                    <span class="input-group-btn tccBut">
                <button class="btn btn-success" type="button" onclick="emdl()">登 录</button>
              </span>
                </div>
            </div>

            <div class="modal-footer2">
                <div class="f">
                    <a href="pwd.aspx">忘记密码?</a></div>
                <div class="r"><a href="register.aspx">注册新用户</a></div>
                <div class="dr"></div>
            </div>

            <div class="d3f modal-body tcck2">
                <a href="#" onClick="tz()" class="qq"></a>
                <a href="https://api.weibo.com:443/oauth2/authorize?client_id=3364913104&redirect_uri=http%3A%2F%2Fwww.jq22.com%2FWeiboReturn.aspx&response_type=code&display=default" class="sina"></a>
                <a href="http://www.jq22.com/zfbReturn.aspx" class="zfb"></a>
                <a href="#" onClick="gt()" class="git"></a>
            </div>
            <script>
                function tz() {
                    var urldz = "https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=101135281&redirect_uri=http://www.jq22.com/QQReturn.aspx?tjurl=" + window.location.href;
                    window.location.href = urldz;
                }
                function gt() {
                    var urldz = "https://github.com/login/oauth/authorize?client_id=cf869185ea7d8fcab6df&state=jq22&redirect_uri=http://www.jq22.com/github.aspx?tjurl=" + window.location.href;
                    window.location.href = urldz;
                }
            </script>

        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>


<div class="yn jz container-fluid nav-bgn m0 " id="menu_wrap" >
    <div class="container m0" style="position:relative;"><a class="nzz" href="http://www.jq22.com/jqueryUI-1-jq" id="z1"><span class="sort"><i class="fa fa-paint-brush"></i>&nbsp;UI <i class="fa fa-angle-down"></i></span></a>|<a class="nzz" href="http://www.jq22.com/jquery输入-1-jq" id="z2"><span class="sort"><i class="fa fa-keyboard-o"></i>&nbsp;输入 <i class="fa fa-angle-down"></i></span></a>|<a class="nzz" href="http://www.jq22.com/jquery媒体-1-jq" id="z3"><span class="sort"><i class="fa fa-film"></i>&nbsp;媒体 <i class="fa fa-angle-down"></i></span></a>|<a class="nzz" href="http://www.jq22.com/jquery导航-1-jq" id="z4"><span class="sort "><i class="fa fa-paper-plane-o"></i>&nbsp;导航 <i class="fa fa-angle-down"></i></span></a><span class="navxs">|<a class="nzz" href="http://www.jq22.com/jquery其他-1-jq" id="z5"><span class="sort"><i class="fa fa-dropbox"></i>&nbsp;其他 <i class="fa fa-angle-down"></i></span></a></span><span class="navxs">|<a href="http://www.jq22.com/jquery-plugins布局-1-jq" target="_blank"><span class="sort"><i class="fa fa-th-large"></i>&nbsp;网页模板</span></a>|<a href="http://www.jq22.com/webinfo1" target="_blank"><span class="sort"><i class="fa fa-file-code-o"></i>&nbsp;常用代码</span></a></span></div>

    <div class="container-fluid"><div id="n1" class="nav-zi ty" style="display: none;"><ul id="nz1" class="nn list-inline container m0" style="display: none;"><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins背景-1-jq"><i class="fa fa-delicious ls"></i>背景</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins对话框和灯箱-1-jq"><i class="fa fa-bell-o ls"></i>对话框和灯箱</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins筛选及排序-1-jq"><i class="fa fa-sort-numeric-desc ls"></i>筛选及排序</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins反馈-1-jq"><i class="fa fa-comments-o ls"></i>反馈</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins弹出层-1-jq"><i class="fa fa-stack-overflow ls"></i>弹出层</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins悬停-1-jq"><i class="fa fa-hand-o-up ls"></i>悬停</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins布局-1-jq"><i class="fa fa-th-large ls"></i>布局</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins图表-1-jq"><i class="fa fa-bar-chart ls"></i>图表</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins加载-1-jq"><i class="fa fa-spinner ls"></i>加载</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins圆边-1-jq"><i class="fa fa-circle-o ls"></i>圆边</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins滚动-1-jq"><i class="fa fa-long-arrow-down ls"></i>滚动</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins标签-1-jq"><i class="fa fa-tags ls"></i>标签</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins文本链接-1-jq"><i class="fa fa-link ls"></i>文本链接</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins工具提示-1-jq"><i class="fa fa-info-circle ls"></i>工具提示</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins网络类型-1-jq"><i class="fa fa-code-fork ls"></i>网络类型</a></li></ul><ul id="nz2" class="nn list-inline container m0" style="display: none;"><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins拾色器-1-jq"><i class="fa fa-eyedropper ls"></i>拾色器</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins定制和风格-1-jq"><i class="fa fa-paint-brush ls"></i>定制和风格</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins日期和时间-1-jq"><i class="fa fa-clock-o ls"></i>日期和时间</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins拖和放-1-jq"><i class="fa fa-arrows ls"></i>拖和放</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins通用输入-1-jq"><i class="fa fa-keyboard-o ls"></i>通用输入</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins自动完成-1-jq"><i class="fa fa-calculator ls"></i>自动完成</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins密码-1-jq"><i class="fa fa-lock ls"></i>密码</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins投票率-1-jq"><i class="fa fa-thumbs-up ls"></i>投票率</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins搜索-1-jq"><i class="fa fa-search ls"></i>搜索</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins选择框-1-jq"><i class="fa fa-caret-square-o-down ls"></i>选择框</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins快捷键-1-jq"><i class="fa fa-adn ls"></i>快捷键</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins触摸-1-jq"><i class="fa fa-hand-o-down ls"></i>触摸</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins丰富的输入-1-jq"><i class="fa fa-h-square ls"></i>丰富的输入</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins上传-1-jq"><i class="fa fa-upload ls"></i>上传</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins验证-1-jq"><i class="fa fa-key ls"></i>验证</a></li></ul><ul id="nz3" class="nn list-inline container m0" style="display: none;"><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins音频和视频-1-jq"><i class="fa fa-play-circle-o ls"></i>音频和视频</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins幻灯片和轮播图-1-jq"><i class="fa fa-exchange ls"></i>幻灯片和轮播图</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins图片展示-1-jq"><i class="fa fa-eye ls"></i>图片展示</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins图像-1-jq"><i class="fa fa-picture-o ls"></i>图像</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins地图-1-jq"><i class="fa fa-map-marker ls"></i>地图</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins滑块和旋转-1-jq"><i class="fa fa-arrows-h ls"></i>滑块和旋转</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-pluginsTabs-1-jq"><i class="fa fa-folder-o ls"></i>Tabs</a></li></ul><ul id="nz4" class="nn list-inline container m0" style="display: none;"><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins水平导航-1-jq"><i class="fa fa-long-arrow-right ls"></i>水平导航</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins垂直导航-1-jq"><i class="fa fa-long-arrow-down ls"></i>垂直导航</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins文件树-1-jq"><i class="fa fa-sitemap ls"></i>文件树</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins分页-1-jq"><i class="fa fa-chevron-right ls"></i>分页</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins手风琴菜单-1-jq"><i class="fa fa-trello ls"></i>手风琴菜单</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins其他导航-1-jq"><i class="fa fa-location-arrow ls"></i>其他导航</a></li></ul><ul id="nz5" class="nn list-inline container m0" style="display: none;"><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins动画效果-1-jq"><i class="fa fa-rocket ls"></i>动画效果</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins浏览器调整-1-jq"><i class="fa fa-expand ls"></i>浏览器调整</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins移动-1-jq"><i class="fa fa-arrows-v ls"></i>移动</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins独立的部件-1-jq"><i class="fa fa-cogs ls"></i>独立的部件</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins杂项-1-jq"><i class="fa fa-gift ls"></i>杂项</a></li><li><a class="c-btn c-btn--border-line" href="http://www.jq22.com/jquery-plugins游戏-1-jq"><i class="fa fa-gamepad ls"></i>游戏</a></li></ul></div></div>

</div>
<!--主体-->
<div class="container m0 bod top70" id="zt">
    <!--左-->
    <div class="col-lg-9 col-md-12 col-sm-12">
        <div class="project">
            <div class="adinfo">

            </div>
            <div class="project-header">
                <h1>基于bootstrap实现的后台框架</h1>
                <p>所属分类：UI-布局</p>
                <div class="row pd10">
                    <div class="f">
                        <span><i class="fa fa-eye"></i>  &nbsp;102478 </span>
                        <span><i class="fa fa-heart"></i>  &nbsp;653 </span>
                        <span style="border-right: 0;  "><a href="message3724"><i class="fa fa-comment"></i>  &nbsp;查看评论 <span style="color:#ff0000;border-right: 0; font: 20px/24px Georgia;">(246)</span></a> </span>
                    </div>
                    <div class="r fx">
                        <div class="bdsharebuttonbox" data-tag="share_1">
                            <a class="ttqq" data-cmd="sqq" title="分享到QQ好友"></a>
                            <a class="ttwx" data-cmd="weixin" href="#"></a>
                            <a class="ttqzone" data-cmd="qzone"></a>
                            <a class="ttsina" data-cmd="tsina"></a>
                            <a class="ttbdhome" data-cmd="bdhome"></a>
                            <a class="tttqq" data-cmd="tqq"></a>
                            <a class="tthuaban" data-cmd="huaban"></a>
                            <a class="ttfbook" data-cmd="fbook"></a>
                            <a class="ttmore" data-cmd="more"></a>
                        </div>
                    </div>

                    <div class="dr"></div>
                </div>

            </div>
            <div class="project-content inad">
                <img src="http://assets.jq22.com/plugin/2015-07-28-23-07-04.png" class="thumbile" alt="基于bootstrap实现的后台框架">
                <img src="http://www.jq22.com/img/9.png" class="thumbile" alt="ie兼容9"/>
                <div class="row text-center" style="margin-bottom:30px;margin-top: 10px;" onclick="adtonji4()">
                    <a href="http://web.tanzhouedu.com/index/keCourse.html" target="_blank"><img src="http://www.jq22.com/img/ad/dwad820-90.png" /></a>
                    <script>
                        function adtonji4() { $.post("adtongji.aspx", { name: "a4" }) }
                    </script>
                </div>

                <div class="thumbile">
                    <a href="http://www.jq22.com/yanshi3724" target="_blank" class="btn btn-success"><i class="fa fa-eye"></i> &nbsp;查看演示</a>
                    <a href="" target="_blank" class="btn btn-info" style="display:none"><i class="fa fa-globe"></i> &nbsp;website</a>
                    <a href="javascript:void(0)" onclick="mydown()" class="btn btn-danger" data-toggle="modal" data-target="#mydown"><i class="fa fa-cloud-download"></i> &nbsp;立即下载</a>
                    <a class="btn jcjg" style="line-height: 28px;"><img src="img/jcjg.png" /></a>
                </div>

                <div class="alert cjms" role="alert">插件描述：基于bootstrap实现的后台框架</div>

                <ul class="x-top" style="padding-left:0px">
                    <div class="fy f zhs"><span class="jg35">PREVIOUS:</span></div>
                    <div class="fy f txtRight zhs"><span class="jg352">NEXT:</span></div>
                    <div class="fy f"><a class='PREVIOUS' href='http://www.jq22.com/jquery-info3725'> JQ表单选择插件 </a> </div>
                    <div class="fy f txtRight"><a class='NEXT' href='http://www.jq22.com/jquery-info3718'> jquery仿app产品筛选列表 </a> </div>
                    <div class="dr"></div>
                    <div class="df"></div>
                </ul>
            </div>

            <div class="in100">
                <div class="row" style="padding:0px 20px 10px 20px">
                    <div class="f z16"> 相关插件-布局</div>
                    <div class="r z16"><a href="jquery-plugins布局-1-jq"> 查看更多 <i class="fa fa-angle-right"></i></a></div>
                </div>

                <div class="col-lg-4 col-md-3 col-sm-4">
                    <a href="http://www.jq22.com/jquery-info15358"><img src="http://assets.jq22.com/plugin/2017-08-17-00-40-32.png"></a>
                    <div class="cover-info">
                        <a href="http://www.jq22.com/jquery-info15358"><h4> jQuery非对称瀑布插件Flex</h4></a>
                        <small> jQuery非对称瀑布流动画网格插件Flex</small>
                    </div>
                    <div class="cover-fields">
                        <i class="fa fa-list-ul"></i> &nbsp;
                        布局
                    </div>
                    <div class="cover-stat">
                        <i class="fa fa-eye"></i><span class="f10"> &nbsp;7908</span>
                        <i class="fa fa-heart"></i></i><span class="f10"> &nbsp;69</span>
                        <div class="cover-yh">
                            <a href="http://www.jq22.com/mem471592" data-container="body" data-toggle="popover" data-placement="top" data-content="妮 ">
                                <i class="fa fa-user-secret"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-3 col-sm-4">
                    <a href="http://www.jq22.com/jquery-info2217"><img src="http://assets.jq22.com/plugin/pc-4c111adc-c5a5-11e4-8d96-00163e001348.png"></a>
                    <div class="cover-info">
                        <a href="http://www.jq22.com/jquery-info2217"><h4>简洁清爽Bootstrap后台模板</h4></a>
                        <small>Bootstrap框架开发的HTML后台模板管理</small>
                    </div>
                    <div class="cover-fields">
                        <i class="fa fa-list-ul"></i> &nbsp;
                        布局
                    </div>
                    <div class="cover-stat">
                        <i class="fa fa-eye"></i><span class="f10"> &nbsp;135373</span>
                        <i class="fa fa-heart"></i></i><span class="f10"> &nbsp;517</span>
                        <div class="cover-yh">
                            <a href="http://www.jq22.com/mem42988" data-container="body" data-toggle="popover" data-placement="top" data-content="逗你玩 ">
                                <i class="fa fa-user-secret"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-3 col-sm-4">
                    <a href="http://www.jq22.com/jquery-info12833"><img src="http://assets.jq22.com/plugin/2017-03-01-22-44-20.png"></a>
                    <div class="cover-info">
                        <a href="http://www.jq22.com/jquery-info12833"><h4>Flatlab_Admin黑灰色扁平化自适应手机</h4></a>
                        <small>一款经典的国外HTML5模板，支持自适应功能 这是一款不错的后台，很漂亮的UI设计！</small>
                    </div>
                    <div class="cover-fields">
                        <i class="fa fa-list-ul"></i> &nbsp;
                        布局
                    </div>
                    <div class="cover-stat">
                        <i class="fa fa-eye"></i><span class="f10"> &nbsp;15775</span>
                        <i class="fa fa-heart"></i></i><span class="f10"> &nbsp;145</span>
                        <div class="cover-yh">
                            <a href="http://www.jq22.com/mem447717" data-container="body" data-toggle="popover" data-placement="top" data-content="qq12345643534 ">
                                <i class="fa fa-user-secret"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-3 col-sm-4">
                    <a href="http://www.jq22.com/jquery-info3792"><img src="http://assets.jq22.com/plugin/2015-08-05-14-08-45.png"></a>
                    <div class="cover-info">
                        <a href="http://www.jq22.com/jquery-info3792"><h4>Bootstrap首页分布效果</h4></a>
                        <small>Bootstrap框架下的首页demo，动画效果丰富</small>
                    </div>
                    <div class="cover-fields">
                        <i class="fa fa-list-ul"></i> &nbsp;
                        布局
                    </div>
                    <div class="cover-stat">
                        <i class="fa fa-eye"></i><span class="f10"> &nbsp;17188</span>
                        <i class="fa fa-heart"></i></i><span class="f10"> &nbsp;298</span>
                        <div class="cover-yh">
                            <a href="http://www.jq22.com/mem112790" data-container="body" data-toggle="popover" data-placement="top" data-content="lizm ">
                                <i class="fa fa-user-secret"></i>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="df"></div>
            </div>

            <div class="in2">
                <h4>讨论这个项目（246）<span class="z14">回答他人问题或分享插件使用方法奖励jQ币</span></h4>

                <div class="pl">
                    <div class="tx"><a href="http://www.jq22.com/mem750253"><img src="http://www.jq22.com/tx/54.png"></a></div>
                    <ul class="plbg">
                        <div class="f"> MY朦胧的爱 <span class="jl">0</span></div>
                        <div class="r"> <span class="z12">2018/1/18 12:01:30</span></div>
                        <div class="dr"></div>
                    </ul>
                    <ul style="word-wrap: break-word;width: 100%">
                        <p>&nbsp;大神&nbsp; 求分享 1510352122@qq.com 十分感谢&nbsp;</p>

                        <a class="hf" name="51342">回复</a>
                        <div class="lyhf"></div>

                        <div class="dr"></div>
                    </ul>
                </div>

                <div class="pl">
                    <div class="tx"><a href="http://www.jq22.com/mem83971"><img src="http://www.jq22.com/tx/8.png"></a></div>
                    <ul class="plbg">
                        <div class="f"> 心海 <span class="jl">0</span></div>
                        <div class="r"> <span class="z12">2018/1/17 13:17:37</span></div>
                        <div class="dr"></div>
                    </ul>
                    <ul style="word-wrap: break-word;width: 100%">
                        <p>老哥求源码， 感谢 718851817@qq.com</p>

                        <a class="hf" name="51276">回复</a>
                        <div class="lyhf"></div>

                        <div class="dr"></div>
                    </ul>
                </div>

                <div class="pl">
                    <div class="tx"><a href="http://www.jq22.com/mem17492"><img src="http://www.jq22.com/tx/30.png"></a></div>
                    <ul class="plbg">
                        <div class="f"> 安志清 <span class="jl">0</span></div>
                        <div class="r"> <span class="z12">2018/1/16 9:37:10</span></div>
                        <div class="dr"></div>
                    </ul>
                    <ul style="word-wrap: break-word;width: 100%">
                        <p>看着很好，不知道对中文支持的怎么样</p>

                        <a class="hf" name="51166">回复</a>
                        <div class="lyhf"></div>

                        <div class="dr"></div>
                    </ul>
                </div>

                <div class="pl">
                    <div class="tx"><a href="http://www.jq22.com/mem67978"><img src="http://www.jq22.com/tx/30.png"></a></div>
                    <ul class="plbg">
                        <div class="f"> 拇指看 <span class="jl">0</span></div>
                        <div class="r"> <span class="z12">2018/1/2 19:56:27</span></div>
                        <div class="dr"></div>
                    </ul>
                    <ul style="word-wrap: break-word;width: 100%">
                        <p>求分享，多谢</p>

                        <a class="hf" name="50281">回复</a>
                        <div class="lyhf"></div>

                        <div class="dr"></div>
                    </ul>
                </div>

                <div class="pl">
                    <div class="tx"><a href="http://www.jq22.com/mem708281"><img src="http://www.jq22.com/tx/24.png"></a></div>
                    <ul class="plbg">
                        <div class="f"> Poseidon? <span class="jl">0</span></div>
                        <div class="r"> <span class="z12">2017/12/27 15:31:13</span></div>
                        <div class="dr"></div>
                    </ul>
                    <ul style="word-wrap: break-word;width: 100%">
                        回答他人问题或分享插件使用方法奖励jQ币

                        <a class="hf" name="50003">回复</a>
                        <div class="lyhf"></div>

                        <div class="dr"></div>
                    </ul>
                </div>

                <div class="pl">
                    <div class="tx"><a href="http://www.jq22.com/mem436328"><img src="http://www.jq22.com/tx/7.png"></a></div>
                    <ul class="plbg">
                        <div class="f"> xiaotianyue361 <span class="jl">0</span></div>
                        <div class="r"> <span class="z12">2017/11/23 15:29:46</span></div>
                        <div class="dr"></div>
                    </ul>
                    <ul style="word-wrap: break-word;width: 100%">
                        <p>847609814@qq.com 求大神分享 万分感谢</p>

                        <ul>
                            <div class="pl">
                                <div class="tx tx2"><a href="http://www.jq22.com/mem515861"><img src="http://www.jq22.com/tx/14.png"></a></div>
                                <ul class="plbg plbg2">
                                    <div class="f"> YannPro<span class="jl">0</span></div>
                                    <div class="r"> <span class="z12">2017/12/9 12:53:54</span></div>
                                    <div class="dr"></div>
                                </ul>
                                <ul style="padding-top: 10px; padding-bottom: 10px;word-wrap: break-word;width: 100%">
                                    <p>3213</p>
                                </ul>
                            </div>
                        </ul>

                        <ul>
                            <div class="pl">
                                <div class="tx tx2"><a href="http://www.jq22.com/mem146413"><img src="http://www.jq22.com/tx/34.png"></a></div>
                                <ul class="plbg plbg2">
                                    <div class="f"> 淡漠口旧回忆<span class="jl">0</span></div>
                                    <div class="r"> <span class="z12">2017/12/13 17:12:24</span></div>
                                    <div class="dr"></div>
                                </ul>
                                <ul style="padding-top: 10px; padding-bottom: 10px;word-wrap: break-word;width: 100%">
                                    <p>求求求求大神分享&nbsp; &nbsp;675094859@qq.com&nbsp; &nbsp;</p>
                                </ul>
                            </div>
                        </ul>

                        <ul>
                            <div class="pl">
                                <div class="tx tx2"><a href="http://www.jq22.com/mem546763"><img src="http://www.jq22.com/tx/51.png"></a></div>
                                <ul class="plbg plbg2">
                                    <div class="f"> localhost:8080/index.jsp<span class="jl">0</span></div>
                                    <div class="r"> <span class="z12">2017/12/25 13:49:13</span></div>
                                    <div class="dr"></div>
                                </ul>
                                <ul style="padding-top: 10px; padding-bottom: 10px;word-wrap: break-word;width: 100%">
                                    <p>1056628407@qq.com 求大神分享</p>
                                </ul>
                            </div>
                        </ul>

                        <a class="hf" name="47700">回复</a>
                        <div class="lyhf"></div>

                        <div class="dr"></div>
                    </ul>
                </div>

                <div class="pl">
                    <div class="tx"><a href="http://www.jq22.com/mem346334"><img src="http://www.jq22.com/tx/36.png"></a></div>
                    <ul class="plbg">
                        <div class="f"> ?  <span class="jl">0</span></div>
                        <div class="r"> <span class="z12">2017/11/9 21:57:13</span></div>
                        <div class="dr"></div>
                    </ul>
                    <ul style="word-wrap: break-word;width: 100%">
                        很棒的样子，求学习

                        <a class="hf" name="46764">回复</a>
                        <div class="lyhf"></div>

                        <div class="dr"></div>
                    </ul>
                </div>

                <div class="pl">
                    <div class="tx"><a href="http://www.jq22.com/mem531359"><img src="http://www.jq22.com/tx/13.png"></a></div>
                    <ul class="plbg">
                        <div class="f"> 道名学社 <span class="jl">0</span></div>
                        <div class="r"> <span class="z12">2017/11/2 14:55:41</span></div>
                        <div class="dr"></div>
                    </ul>
                    <ul style="word-wrap: break-word;width: 100%">
                        <p>求分享~~~</p>

                        <ul>
                            <div class="pl">
                                <div class="tx tx2"><a href="http://www.jq22.com/mem67978"><img src="http://www.jq22.com/tx/30.png"></a></div>
                                <ul class="plbg plbg2">
                                    <div class="f"> 拇指看<span class="jl">0</span></div>
                                    <div class="r"> <span class="z12">2018/1/2 19:57:34</span></div>
                                    <div class="dr"></div>
                                </ul>
                                <ul style="padding-top: 10px; padding-bottom: 10px;word-wrap: break-word;width: 100%">
                                    <p>求分享</p>
                                </ul>
                            </div>
                        </ul>

                        <a class="hf" name="46225">回复</a>
                        <div class="lyhf"></div>

                        <div class="dr"></div>
                    </ul>
                </div>

                <div class="pl">
                    <div class="tx"><a href="http://www.jq22.com/mem654098"><img src="http://www.jq22.com/tx/14.png"></a></div>
                    <ul class="plbg">
                        <div class="f"> MISSYOU丨芭比 <span class="jl">0</span></div>
                        <div class="r"> <span class="z12">2017/9/25 16:45:19</span></div>
                        <div class="dr"></div>
                    </ul>
                    <ul style="word-wrap: break-word;width: 100%">
                        <p>看着特别棒，我也要这个</p>

                        <a class="hf" name="43930">回复</a>
                        <div class="lyhf"></div>

                        <div class="dr"></div>
                    </ul>
                </div>

                <div class="pl">
                    <div class="tx"><a href="http://www.jq22.com/mem137612"><img src="http://www.jq22.com/tx/28.png"></a></div>
                    <ul class="plbg">
                        <div class="f"> 埋名 <span class="jl">0</span></div>
                        <div class="r"> <span class="z12">2017/9/20 9:19:59</span></div>
                        <div class="dr"></div>
                    </ul>
                    <ul style="word-wrap: break-word;width: 100%">
                        <p>特别好，下来看看特别好，下来看看</p>

                        <a class="hf" name="43545">回复</a>
                        <div class="lyhf"></div>

                        <div class="dr"></div>
                    </ul>
                </div>

                <div class="text-center z20 top20 pla plb"><a href="message3724"><i class="fa fa-comment" aria-hidden="true"></i> 查看更多评论 <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
                <a name="anchor"></a>
                <div class="df dr"></div>
            </div>

            <div class="in2">
                <div id="err" class="alert alert-danger" role="alert" style="display:none"><i class="fa fa-smile-o"></i> 登录后才可以评论</div>
                <div id="err2" class="alert alert-warning" role="alert" style="display:none"><i class="fa fa-smile-o"></i> 30秒后在评论吧!</div>
                <textarea id='textarea1' style='height:200px; width:100%;'></textarea>

                <div class="r top10">
                    <button onclick="getPlainTxt()" type="button" id="myButton" data-loading-text="Loading..." class="btn btn-primary" autocomplete="off">
                        发表评论
                    </button>

                </div>
                <div class="dr"></div>
            </div>

            <div class="huif">
                <textarea id='textarea2' style='height:150px; width:100%;'></textarea>
                <button onclick="hftj()" type="button"  class="btn btn-primary top10">回复</button>
                <a class="qxhf" onclick="qx()" style="padding-top: 10px;">取消回复</a>
            </div>
        </div>

    </div>

    <!--end左-->

    <!--右-->
    <div class="col-lg-2 visible-lg" style="width:200px">
        <div class="affd" style="width:200px">
            <ul class="zuo f ">
                <h6>PROMULGATOR</h6>
                <a href="../mem1730"><img src="../tx/13.png"></a>
                <div class="zuox f">
                    <h4>夜雨流星</h4>
                    <i class="fa fa-map-marker"></i> <span>江苏省南京市</span>
                </div>
                <button type="button" class="btn btn-z top20" onclick="zuozhe()"><i class='fa fa-plus-circle'></i> 关注作者 <span>(100)</span></button>
                <button type="button" class="btn btn-z top10" onclick="sc()"><i class='fa fa-heart-o'></i> 收藏此插件 <span>(653)</span></button>
                <a  href="shoucangadd.aspx"  class="btn  btn-danger top10" style="display:none" id="scs" > 收藏插件以超出上限！<br /><b> 点击增加上限数 </b></a>
                <div class="df"></div>
            </ul>
            <div class="df"></div>
        </div>
        <ul class="list-group" style="margin-bottom:10px">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="搜索插件.." style="height: 34px; margin-top: 8px;" id="searchtxt">
                <span class="input-group-btn">
    <button class="btn btn-default" type="button" id="seobut" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-left-width: 0px;"><i class="fa fa-search"></i></button>
    </span>

            </div>
        </ul>

        <ul class="list-group">
            <a class="list-group-item on" href="http://www.jq22.com/jq1-jq1" data-para="time"><i class="fa fa-flag"></i> &nbsp;最新发布</a>
            <a class="list-group-item" href="http://www.jq22.com/jq1-jq4" data-para="comments"><i class="fa fa-heart"></i> &nbsp;最多收藏</a>
            <a class="list-group-item" href="http://www.jq22.com/jq1-jq2" data-para="comments"><i class="fa fa-comments-o"></i> &nbsp;最多评论</a>
            <a class="list-group-item" href="http://www.jq22.com/jq1-jq3" data-para="downloads"><i class="fa fa-arrow-circle-o-down"></i> &nbsp;最多下载</a>
            <a class="list-group-item" href="http://www.jq22.com/jq1-jq8" data-para="ie8"><i class="fa fa-bus"></i> &nbsp;兼容IE8</a>
            <a class="list-group-item" href="http://www.jq22.com/jq1-jq6" data-para="ie6"><i class="fa fa-motorcycle"></i> &nbsp;兼容IE6</a>
        </ul>
        <ul class="list-group" >
            <a class="list-group-item on" href="http://www.jq22.com/cssgsh" data-para="time"><i class="fa fa-css3"></i> &nbsp;css 格式化工具</a>
            <a class="list-group-item on" href="http://www.jq22.com/jsgsh" data-para="time"><i class="fa fa-code"></i> &nbsp;js 格式化工具</a>
            <a class="list-group-item on" href="http://www.jq22.com/cdn" data-para="time"><i class="fa fa-rocket"></i> &nbsp;CDN加速</a>
        </ul>
        <ul class="list-group" style="margin-top:0px">
            <button type="button" class="btn btn-info" style="width:100%" onclick="fbcj()">发布资源获得jQ币</button>
            <a class="btn btn-success top10" style="width:100%" href="http://www.jq22.com/zxzf.aspx">直接获得jQ币</a>
        </ul>
    </div>

    <!--end右-->
</div>
<!--end主体-->


<div class="itop"></div>

<!-- Modal -->
<div class="modal fade" id="mydown" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content dwontop">
            <div class="modal-header dwonbtbg dwonx">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title " id="myModalLabel">基于bootstrap实现的后台框架</h4>
            </div>
            <div class="modal-body ">
                <div class="yuei">
                    <i class="fa fa-btc"></i> 我当前jQ币余额：<span class="z30 f20 og" id="jf">正在获取..</span> <i class="fa fa-download"></i> 已下载次数：<span class="z30">3107</span>
                </div>
                <div class="yuei">
                    <span class="xzsm">所需jQ币：<span class="en">7</span></span><a href="javascript:void(0)" onclick="xz()" class="xzsm xza"><i class="fa fa-download"></i> 开始下载</a>
                </div>
                <div id="err3" class="alert alert-danger top20" role="alert" style="display:none;background-color: #FFF6F6;"><i class="fa fa-frown-o"></i> <span id="xzts"></span></div>
            </div>
        </div>
    </div>
</div>

<form id="openWin" action="#" target="_blank" method="get"></form>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/m.js"></script>
<script type="text/javascript" src="/css/sh/shCore.js"></script>
<script type="text/javascript" src="{{url('js/pifu.js')}}"></script>
<script type="text/javascript" src="/css/sh/shBrushXml.js"></script>
<script type="text/javascript">SyntaxHighlighter.highlight();</script>
<script type="text/javascript" src='/js/wangEditor.min.js'></script>
<script type="text/javascript" charset="utf-8">
    $('.affd').affix({ offset: { top: $('.affd').offset().top + 500 } });
    $("#seobut").click(function () { var seo = $("#searchtxt").val(); if (seo.length > 1) { window.location.href = "search?seo=" + seo; } });
    $('#searchtxt').bind('keypress', function (event) { if (event.keyCode == "13") { var seo = $("#searchtxt").val(); if (seo.length > 1) { window.location.href = "search?seo=" + seo; } } });
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
    var a = "3724";
    var dzurl = window.location.href.substr(0, 26);
    var dzurl2 = window.location.href.substr(0, 22);
    var dzurl3 = window.location.href.substr(0, 27);
    var dzurl4 = window.location.href.substr(0, 11);
    if (dzurl == "http://www.jq22.com/plugin" || dzurl2 == "http://jq22.com/plugin" || dzurl3 == "http://jq22.com/jquery-info" || dzurl4 == "http://demo") {
        window.location.href = "http://www.jq22.com/jquery-info" + a;
    }
    var errstr = window.location.href;
    sperrstr = errstr.split("");
    errul = sperrstr[sperrstr.length - 1];
    if (errul == "/") {
        errstr = errstr.substring(0, errstr.length - 1);
        window.location.href = errstr;
    }
    var b = "1730";
    var lytjbut = document.getElementById('myButton');
    function getPlainTxt() {
        if ($('#textarea1').val().length > 5) {
            lytjbut.disabled = true;
        }
        setTimeout(function () {
            var k="o";
            if(k=="0"){
                myLogin($('#textarea1').val());
            }
            else
            {
                $("#err").css("display", "block");
            }

        }, 1000);
    }
    var pid;
    $(".hf").click(function () {
        pid=$(this).attr("name");
        $(".hf").css("padding-bottom", "10px");
        $(".huif").css({ "top": $(this).offset().top - 30, "display": "block" });
        $(this).css("padding-bottom", "300px");
    });
    function qx() {
        $(".hf").css("padding-bottom", "10px");
        $(".huif").css("display", "none");
    }
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
                data: { yy: pid, nr:hfHTML, ww:a},
                cache: false,
                dataType: 'text',
                success: function (data){
                    if (data == "y") {
                        window.location.reload();
                    } else {
                        $("#err2").css("display", "block");
                        $("#err2").addClass("dou2");
                    }
                },
                error: function () { }
            });
        }
    }
    function myLogin(aa) {
        var jhf = aa;
        jhf = jhf.replace(/<(script)[\S\s]*?\1>|style\=".+?"|title\=".+?"|class\=".+?"/gi, "");
        jhf = jhf.replace(/<p><br><\/p>|<p><\/p>/gi, "");
        jhf = jhf.replace(/<\/?([a-o]|[q-s]|[u-z])[^>]*>/gi, "");
        jhf = jhf.replace(/<\/?(textarea)[^>]*>/gi, "");
        var encodeHTML = encodeURIComponent(jhf);
        if (aa.length > 3) {
            var yz = $.ajax({
                type: 'post',
                url: '/lyadd.aspx',
                data: { wz: a, nr: encodeHTML, zz: b },
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
                error: function () { }
            });
        }
    }
    function mydown() {
        var yz = $.ajax({
            type: 'post',
            url: '/down.aspx',
            data: {},
            cache: false,
            dataType: 'text',
            success: function (data) {
                $("#jf").html(data);
            },
            error: function () { }
        });
    }
    function xz() {
        var yz = $.ajax({
            type: 'post',
            url: '/xz.aspx',
            data: { wz: a },
            cache: false,
            dataType: 'text',
            success: function (data) {
                if (data == '3') {
                    $("#xzts").html("登录后才可以下载！");
                    $("#err3").css("display", "block");
                    $("#err3").addClass("dou2");
                }
                else if (data == '0') {
                    $("#err3").css("display", "block");
                    $("#err3").addClass("dou2");
                    $("#xzts").html("余额不足,发布资源、回答他人提问、分享插件使用方法奖励jQ币，或者直接 <b><a href='http://www.jq22.com/zxzf.aspx' target='_blank' style='color: #24B900; font-size:17px'>充值!</a></b>");
                }
                else
                {
                    $("#xzts").html(data);
                    window.location.href = "../"+data;
                }
            },
            error: function () { }
        });
    }
    function sc() {
        var yz = $.ajax({
            type: 'post',
            url: '/shou.aspx',
            data: { wz:a},
            cache: false,
            dataType: 'text',
            success: function (data) {
                if (data == "m") {
                    $("#myModal").modal();
                }
                else if (data == "s") {
                    $("#scs").fadeIn(800);
                }
                else {
                    window.location.href = window.location;
                    lytjbut.disabled = false;
                }
            },
            error: function () { }
        });
    }
    function zuozhe() {
        var yz = $.ajax({
            type: 'post',
            url: '/zuozhe.aspx',
            data: {z:b },
            cache: false,
            dataType: 'text',
            success: function (data) {
                if (data == "m") {
                    $("#myModal").modal();
                } else {
                    window.location.href = window.location;
                }
            },
            error: function () { }
        });
    }
    function fbcj() {
        yh = "";
        if (yh != "") {
            window.location.href = "jq22Release.aspx";
        } else {
            $("#myModal").modal();
        }
    }
    $(".jl").each(function () {
        if ($(this).text() > 0) {
            $(this).css('display', 'inline-block');
            $(this).html("评论奖励 " + $(this).text() + " jQ币");
        }
    });
    $(function () { var e = $(".itop"); $(window).scroll(function () { var t = $(document).scrollTop(); if (t > 300) { e.fadeIn("slow") } else { e.fadeOut("slow") } }); e.click(function () { $("html,body").animate({ scrollTop: 0 }, 500) }) });

    $.post("newsMessage.aspx", function (data) { if (data == "y") { $(".xyd").fadeIn("slow") } });
</script>
<script>
    window._bd_share_config = {
        common : {
            bdText : '基于bootstrap实现的后台框架',
            bdDesc : '基于bootstrap实现的后台框架',
            bdUrl: 'http://www.jq22.com/jquery-info3724',
            bdPic: 'http://assets.jq22.com/plugin/2015-07-28-23-07-04.png'
        },
        share : [{
            "bdSize" : 24
        }],
    }
    with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
</script>
<div id="pfk"></div>
<script src="/js/pifu.js?v=1"></script>


<!--底部-->
<nav class="foot navbar-inverse navbar-fixed-bottom">
    <ul class="list-inline">
        <li class="footer-ss"><a href="copyright.aspx">版权声明</a></li>
        <li class="footer-ss"><a href="feedback.aspx">在线反馈</a></li>
        <li class="footer-ss"><a href="cooperation.aspx">广告合作</a></li>
        <li class="footer-ss">帮助中心</li>
        <li>Copyright © 2012-2018 jQuery插件库Version 3.0.0. 备案号:<a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow">沪ICP备13043785号-1</a></li>
    </ul>
    <ul class="list-inline text-right">
        <li >
        </li>
    </ul>
</nav>
<script src="{{url('js/commentEditor.min.js')}}"></script>

<script>
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?b3a3fc356d0af38b811a0ef8d50716b8";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>


<!--end底部-->

</body>
</html>
