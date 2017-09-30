<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8"/>
    <title>写下点滴</title>
    <link rel="stylesheet" href="{{cdn('plugins/markdown/css/style.css')}}"/>
    <link rel="stylesheet" href="{{cdn('plugins/markdown/css/editormd.css')}}"/>
    <link rel="shortcut icon" href="https://pandao.github.io/editor.md/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
</head>
<body>
<div id="layout">
    <header>
        <h1>写下点滴</h1>
    </header>
    <div>
        <div class="form-group">
            <input type="email" style="width:90%;  margin-top: 0px;margin-right: auto; margin-bottom: 15px; margin-left: auto;" ; class="form-control"   id="title" placeholder="点滴标题" value="{{$article->title or ''}}">
            <input type="hidden" value="{{$article->id or ''}}" id="article_id">
        </div>
        <div id="test-editormd">
            <textarea style="display:none;" id="content" value="{{$article->content or ''}}"></textarea>
        </div>
        <div style="margin-left: 30%">
            <button type="button" class="btn btn-success" onclick="submit_article()">提&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;交</button>
        </div>
    </div>
</div>
<script src="{{cdn('js/jquery.min.js')}}"></script>
<script src="{{cdn('js/common.js')}}"></script>
<script src="{{cdn('plugins/markdown/js/editormd.min.js')}}"></script>
<script src="{{cdn('plugins/layer/layer.js')}}"></script>
<script type="text/javascript">
    var testEditor;
    $(function () {
        testEditor = editormd("test-editormd", {
            width: "90%",
            height: 640,
            syncScrolling: "single",
            path: "../plugins/markdown/lib/"
        });
    });

    /**
     * 提交之后的操作
     */
    function submit_after(data) {
        if(!data.status){
            layer.alert(data.msg);
            return;
        }
        //成功之后转向另一页面，个人的文章列表
        layer.alert(data.msg);
    }

    /**
     * 点击提交的触发操作
     */
    function submit_article() {
        title = trim($("#title").val());
        content = trim($("#content").val());
        if (!title || !content) {
            layer.alert('标题和内容都不能为空');
            return;
        }
        data = {"title": title, "content": content, '_token': "{{csrf_token()}}",'article_id':$("#article_id").val()};
        ajaxFunction('post', data, "{{url('/article/save_article?p=c')}}", submit_after);
    }
</script>
</body>
</html>