<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Ghost 开源博客平台 | Ghost中文网</title>
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/bootstrap-tags.css')}}">

    <link rel="stylesheet" href=" {{url('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href=" {{url('css/buttons.css')}}">

    <link rel="stylesheet" href="{{url('css/write.css')}}">
    <link rel="stylesheet" href="{{url('css/blogmoveform.css')}}">
    <link rel="stylesheet" href="{{url('css/bootstrap-tagsinput.css')}}">

    <link rel="stylesheet" href="{{url('plugins/editor.md-master/css/editormd.css')}}"/>
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
<div class="editormd editormd-vertical editormd-theme-white" style="height:50px;width:68%;border:0px solid #ddd;">
    <label style="font-size:20px">标题</label>
    <input type="text" style="width:92%;margin-left:4%;" name="title" id="title" required/>
</div>
<div id="test-editormd"></div>
<div class="editormd editormd-vertical editormd-theme-white" style="height:0%;border:0px solid #ddd;margin-left:16%">
    <label style="font-size:20px">标签</label>
    <div class="bs-example">
        <input type="text" id="labels" value="
        @foreach($tags as $tag)
                {{$tag}},
         @endforeach
        " data-role="tagsinput" style="display: none;">
    </div>
</div>
<div class="editormd editormd-vertical editormd-theme-white" style="height:0%;border:0px solid #ddd;text-align:center">
<a href="javascript:void(0)" onclick="publish()" class="button button-action button-pill" >发布</a>
</div>
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
<script src="{{url('js/ajax.js')}}"></script>
<script src="{{url('js/plugins/layer/layer.js')}}"></script>
<script src="{{url('js/bootstrap-tags.js')}}"></script>
<script src="{{url('plugins/editor.md-master/editormd.min.js')}}"></script>
<script src="{{url('js/bootstrap-tagsinput-angular.js')}}"></script>
<script src="{{url('js/bootstrap-tagsinput.js')}}"></script>

<script>
    var testEditor;
    function callback_after_save(data){
        if(data.status){
            layer.msg('恭喜发布成功！', {
                offset: 't',
                anim: 6
            },function(){
                location.href="{{url('user/profile')}}"
            });
        }else{
            layer.msg('抱歉保存失败，请重试', {
                offset: 't',
                anim: 6
            });
        }
    }
    function publish() {
        //检测标题
        title = $("#title").val();
        if(title.length==0){
            layer.msg('标题不能为空', function(){
            });
            return;
        }
        //检测内容
        content = testEditor.getHTML();
        if(content.length==0){
            layer.msg('内容不能为空', function(){
            });
            return;
        }
        labels =$("#labels").val()
        send_ajax("{{url('article/save_article')}}",{"title":title,'content':content,'labels':labels,'_token':"{{csrf_token()}}"},'post',callback_after_save);
    }
    $(function () {
        $.get('test.md',
            function (md) {
                testEditor = editormd("test-editormd", {
                    width: "68%",
                    height: 740,
                    path: '../plugins/editor.md-master/lib/',
                    theme: "white",
                    previewTheme: "white",
                    editorTheme: "neo",
                    markdown: md,
                    codeFold: true,
                    //syncScrolling : false,
                    saveHTMLToTextarea: true,    // 保存 HTML 到 Textarea
                    searchReplace: true,
                    //watch : false,                // 关闭实时预览
                    htmlDecode: "style,script,iframe|on*",            // 开启 HTML 标签解析，为了安全性，默认不开启
                    //toolbar  : false,             //关闭工具栏
                    //previewCodeHighlight : false, // 关闭预览 HTML 的代码块高亮，默认开启
                    emoji: true,
                    taskList: true,
                    tocm: true,         // Using [TOCM]
                    tex: true,                   // 开启科学公式TeX语言支持，默认关闭
                    flowChart: true,             // 开启流程图支持，默认关闭
                    sequenceDiagram: true,       // 开启时序/序列图支持，默认关闭,
                    //dialogLockScreen : false,   // 设置弹出层对话框不锁屏，全局通用，默认为true
                    //dialogShowMask : false,     // 设置弹出层对话框显示透明遮罩层，全局通用，默认为true
                    //dialogDraggable : false,    // 设置弹出层对话框不可拖动，全局通用，默认为true
                    //dialogMaskOpacity : 0.4,    // 设置透明遮罩层的透明度，全局通用，默认值为0.1
                    //dialogMaskBgColor : "#000", // 设置透明遮罩层的背景颜色，全局通用，默认为#fff
                    imageUpload: true,
                    imageFormats: ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
                    imageUploadURL: "./php/upload.php",
                    onload: function () {
                        // console.log('onload', this);
                        //this.fullscreen();
                        //this.unwatch();
                        //this.watch().fullscreen();

                        //this.setMarkdown("#PHP");
                        //this.width("100%");
                        //this.height(480);
                        //this.resize("100%", 640);
                    }
                });
            });

    });

</script>
</body>
</html>