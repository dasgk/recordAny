<!DOCTYPE html>
<html lang="zh-CN">
<head>
    @extends('layout.header')
    <link rel="stylesheet" href="{{url('css/persion_space_A.css')}}">
    <link rel="stylesheet" href="{{url('css/write.css')}}">
    <link rel="stylesheet" href="{{url('css/blogmoveform.css')}}">
    <link rel="stylesheet" href="{{url('css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{url('plugins/editor.md-master/css/editormd.css')}}"/>
</head>
<body class="home-template">
<div class="fakeloader"></div>
<div id="body_content" STYLE="display: none">

<!-- start header -->
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
                        <li role="presentation"><a href="{{url('about')}}">关于</a></li>
                        <li role="presentation"><a href="{{url('/search/index')}}">搜索</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="editormd editormd-vertical editormd-theme-white" style="height:50px;width:68%;border:0px solid #ddd;">
    <label style="font-size:20px">标题</label>
    <input type="text" style="width:92%;margin-left:4%;" name="title" id="title" value="{{$article->title or ''}}"
           required/>
    <input type="hidden" style="width:92%;margin-left:4%;" name="id" id="id" value="{{$article->article_id or ''}}"
           required/>
</div>
<div id="test-editormd" class="form-control">
    <textarea style="display:none;"> {!! $article->content_markdown !!}    </textarea>
</div>
<div class="editormd editormd-vertical editormd-theme-white" style="height:0%;border:0px solid #ddd;margin-left:16%">
    <label style="font-size:20px">标签</label>
    <div class="bs-example">
        <input type="text" id="labels" value="
        @foreach($tags as $tag)
        {{$tag['title']}},
         @endforeach
                " data-role="tagsinput" style="display: none;">
    </div>
</div>
<div class="editormd editormd-vertical editormd-theme-white" style="height:0%;border:0px solid #ddd;text-align:center">
    <a href="javascript:void(0)" onclick="publish()" class="button button-action button-pill">发布</a>
</div>

@extends('layout.footer')
<script src="{{url('js/jquery.min.js')}}"></script>
<script src="{{url('js/bootstrap.min.js')}}"></script>
<script src="{{url('js/jquery.fitvids.min.js')}}"></script>
<script src="{{url('js/ajax.js')}}"></script>
<script src="{{url('js/plugins/layer/layer.js')}}"></script>
<script src="{{url('js/bootstrap-tags.js')}}"></script>
<script src="{{url('plugins/editor.md-master/editormd.min.js')}}"></script>
<script src="{{url('js/bootstrap-tagsinput-angular.js')}}"></script>
<script src="{{url('js/bootstrap-tagsinput.js')}}"></script>

<script>
    var testEditor;
    function callback_after_save(data) {
        if (data.status) {
            layer.msg('恭喜发布成功！', {
                offset: 't',
                anim: 6
            }, function () {
                location.href = "{{url('user/profile')}}"
            });
        } else {
            layer.msg('抱歉保存失败，请重试', {
                offset: 't',
                anim: 6
            });
        }
    }
    function publish() {
        //检测标题
        title = $("#title").val();
        if (title.length == 0) {
            layer.msg('标题不能为空', function () {
            });
            return;
        }
        //检测内容
        content = testEditor.getHTML();
        if (content.length == 0) {
            layer.msg('内容不能为空', function () {
            });
            return;
        }
        mark_content = testEditor.getMarkdown();
        labels = $("#labels").val()
        send_ajax("{{url('articles/save_article')}}", {
            "id": $("#id").val(),
            "title": title,
            'content': content,
            'mark_content':mark_content,
            'labels': labels,
            '_token': "{{csrf_token()}}"
        }, 'post', callback_after_save);
    }
    $(function () {

        $.get('test.md',
            function (md) {
                testEditor = editormd("test-editormd", {
                    width: "68%",
                    height: 740,
                    syncScrolling : "single",
                    path: '../plugins/editor.md-master/lib/',
                    sequenceDiagram: true,       // 开启时序/序列图支持，默认关闭,
                    imageUpload: true,
                    htmlDecode:true,
                    _token: "{{csrf_token()}}",
                    saveHTMLToTextarea:true,
                    type_key: 'FT_COMMON',
                    imageFormats: ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
                    imageUploadURL: "{{url('/ueditor/uploadimage?_token='.csrf_token())}}",
                    onload: function () {
                    }
                });

            });

    });
</script>
</body>
</html>