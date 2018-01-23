<!DOCTYPE html>
<html lang="zh-CN">
<head>
    @extends('layout.header')
</head>
<body class="home-template">
<div class="fakeloader"></div>
<div id="body_content" STYLE="display: none">

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
                        <li  role="presentation"><a href="/">首页</a></li>
                        <li role="presentation"><a href="{{url('user/profile')}}">个人中心</a></li>
                        <li  class="nav-current" role="presentation"><a href="{{url('/about')}}">关于</a></li>
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
                        <h1 class="post-title"><a href="{{url('/about')}}">关于我们</a></h1>

                    </div>
                    <div class="post-content">
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;本博客所开之目的在于精炼所学技能，当前版本使用的是laravel5.4，于github上有本项目的源码。</p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;预备在项目中使用的有<strong>迅搜</strong>，<strong>rsync</strong>，
                            <strong>git</strong>，<strong>pvstat</strong>，<strong>防盗链</strong>，<strong></strong></p>

                    </div>
                </article>
            </main>

            <aside class="col-md-4 sidebar">
                <div class="widget">
                    <h4 class="title">用户信息</h4>
                    <div class="content community">
                        <p>昵称：phper</p>
                        <p>联系方式：13642017062@139.com</p>
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
@extends('layout.footer')
<a href="#" id="back-to-top"><i class="fa fa-angle-up"></i></a>

<script src="{{url('js/jquery.min.js')}}"></script>
<script src="{{url('js/bootstrap.min.js')}}"></script>
<script src="{{url('js/jquery.fitvids.min.js')}}"></script>
<script src="{{url('js/highlight.min.js')}}"></script>
<script src="{{url('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{url('js/main.js')}}"></script>
</body>
</html>
