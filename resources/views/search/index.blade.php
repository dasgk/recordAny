<!DOCTYPE html>
<html lang="zh-CN">
<head>
    @extends('layout.header')
    <link rel="stylesheet" type="text/css" href="{{url('fonts/icomoon.ttf')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('fonts/icomoon.woff')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('css/icon.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('css/search_common.css')}}"/>
</head>
<body>
<div class="aw-top-menu-wrap">
    <div class="container">
        <!-- logo -->
        <div class="aw-logo hidden-xs">
            <a href="http://wenda.ghostchina.com"></a>
        </div>
        <!-- end logo -->
        <!-- 搜索框 -->
        <div class="aw-search-box  hidden-xs hidden-sm">
            <form class="navbar-search" action="{{url('search/index')}}" id="global_search_form"
                  method="get">
                <input class="form-control search-query" type="text" placeholder="搜索问题、话题或人" autocomplete="off"
                       name="key" value="{{$key}}"
                       id="aw-search-query"/>
                <span title="搜索" id="global_search_btns" onClick="$('#global_search_form').submit();"><i
                            class="icon icon-search"></i></span>
                <div class="aw-dropdown">
                    <div class="mod-body">
                        <p class="title">输入关键字进行搜索</p>
                        <ul class="aw-dropdown-list hide"></ul>
                        <p class="search"><span>搜索:</span><a onClick="$('#global_search_form').submit();"></a></p>
                    </div>
                    <div class="mod-footer">
                        <a href="" onClick="$('#header_publish').click();"
                           class="pull-right btn btn-mini btn-success publish">发起问题</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- end 搜索框 -->
        <!-- 导航 -->
        <div class="aw-top-nav navbar">
            <div class="navbar-header">
                <button class="navbar-toggle pull-left">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <nav role="navigation" class="collapse navbar-collapse bs-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="" class="active"><i class="icon icon-ul"></i> 发现</a></li>

                </ul>
            </nav>
        </div>

        <div class="aw-user-nav">
            <span>
						<a class="register btn btn-normal btn-success"
                           href="http://wenda.ghostchina.com/account/register/">注册</a>
						<a class="login btn btn-normal btn-primary" href="http://wenda.ghostchina.com/login/">登录</a>
					</span>
        </div>
    </div>
</div>

<div class="aw-container-wrap">

    <div class="container">
        <div class="row">
            <div class="aw-content-wrap clearfix">
                <div class="col-sm-12 col-md-9 aw-main-content">
                    <!-- 新消息通知 -->
                    <div class="aw-mod aw-notification-box hide" id="index_notification">
                        <div class="mod-head common-head">
                            <h2>
                                <span class="pull-right"><a
                                            href="http://wenda.ghostchina.com/setting/privacy/#notifications"
                                            class="text-color-999"><i class="icon icon-setting"></i> 通知设置</a></span>
                                <i class="icon icon-bell"></i>新通知<em class="badge badge-important"
                                                                     name="notification_unread_num"></em>
                            </h2>
                        </div>
                        <div class="mod-body">
                            <ul id="notification_list"></ul>
                        </div>
                        <div class="mod-footer clearfix">
                            <a href="javascript:;" onclick="AWS.Message.read_notification(false, 0, false);"
                               class="pull-left btn btn-mini btn-gray">我知道了</a>
                            <a href="http://wenda.ghostchina.com/notifications/"
                               class="pull-right btn btn-mini btn-success">查看所有</a>
                        </div>
                    </div>
                    <!-- end 新消息通知 -->
                    <!-- tab切换 -->
                    <ul class="nav nav-tabs aw-nav-tabs active hidden-xs">
                        @if($orderBy =='updated_at')
                            <li><a href="{{url('search/index?key='.$key."&orderBy=look_num")}}" id="sort_control_hot">热门</a></li>
                            <li class="active"><a href="{{url('search/index?key='.$key."&orderBy=updated_at")}}">最新</a></li>
                         @else
                            <li class="active"><a href="{{url('search/index?key='.$key."&orderBy=look_num")}}" id="sort_control_hot">热门</a></li>
                            <li ><a href="{{url('search/index?key='.$key."&orderBy=updated_at")}}">最新</a></li>
                        @endif
                        <h2 class="hidden-xs"><i class="icon icon-list"></i> 发现</h2>
                    </ul>
                    <!-- end tab切换 -->


                    <div class="aw-mod aw-explore-list">
                        <div class="mod-body">
                            <div class="aw-common-list">
                                @foreach($info as $item)
                                    <div class="aw-item active" data-topic-id="">
                                        <a class="aw-user-name hidden-xs" data-id="384"
                                           href="http://wenda.ghostchina.com/people/gusi" rel="nofollow"><img
                                                    src="http://wenda.ghostchina.com/static/common/avatar-max-img.png"
                                                    alt=""/></a>
                                        <div class="aw-question-content">
                                            <h4>
                                                <a href="{{url('articles/article_detail?id='.$item['article_id'])}}">{{$item['title']}}</a>
                                            </h4>
                                            <p>
                                                <a href="http://wenda.ghostchina.com/people/gusi"
                                                   class="aw-user-name">{{$item['nick_name']}}</a>
                                                <span class="text-color-999"> • 1 人关注 • {{$item['comment_count']}}
                                                    个回复 • {{$item['look_num'] or 0}}
                                                    次浏览 • {{$item['updated_at']}}</span>
                                                <span class="text-color-999 related-topic hide"> •  来自相关话题</span>
                                            </p>

                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <nav class="pagination" role="navigation">
                                <div class="row">
                                    <div class="col-sm-12">
                                    </div>
                                </div>
                                @if($page['paginator']->currentPage()>1)
                                    <a class="older-posts"
                                       href="{{$page['paginator']->url($page['paginator']->currentPage()-1)}}"><i
                                                class="fa fa-angle-left"></i></a>
                                @endif
                                <span class="page-number">第 {{$page['paginator']->currentPage()}} 页 &frasl;
                                    共 {{$page['paginator']->lastPage()}} 页</span>
                                @if($page['paginator']->hasMorePages())
                                    <a class="older-posts" href="{{$page['paginator']->nextPageUrl()}}"><i
                                                class="fa fa-angle-right"></i></a>
                                @endif
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- 侧边栏 -->
                <div class="col-sm-12 col-md-3 aw-side-bar hidden-xs hidden-sm">
                    <div class="aw-mod aw-text-align-justify">
                        <div class="mod-head">
                            <a href="http://wenda.ghostchina.com/topic/channel-hot" class="pull-right">更多 &gt;</a>
                            <h3>热门话题</h3>
                        </div>
                        <div class="mod-body">
                        </div>
                    </div>
                    <div class="aw-mod aw-text-align-justify">
                        <div class="mod-head">
                            <a href="http://wenda.ghostchina.com/people/" class="pull-right">更多 &gt;</a>
                            <h3>热门用户</h3>
                        </div>
                        <div class="mod-body">
                        </div>
                    </div>
                </div>
                <!-- end 侧边栏 -->
            </div>
        </div>
    </div>
</div>
@extends('layout.footer')
</div>
<script src="{{url('js/jquery.min.js')}}"></script>
<script src="{{url('js/bootstrap.min.js')}}"></script>
<script src="{{url('js/jquery.fitvids.min.js')}}"></script>
<script src="{{url('js/highlight.min.js')}}"></script>
<script src="{{url('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{url('js/main.js')}}"></script>
</body>
</html>