<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8" />
    <title>Simple example - Editor.md examples</title>
    <link rel="stylesheet" href="<?php echo e(cdn('plugins/markdown/css/style.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(cdn('plugins/markdown/css/editormd.css')); ?>" />
    <link rel="shortcut icon" href="https://pandao.github.io/editor.md/favicon.ico" type="image/x-icon" />
</head>
<body>
<div id="layout">
    <header>
        <h1>新建文章</h1>
    </header>
    <div id="test-editormd">
        <textarea style="display:none;"></textarea>
    </div>
</div>
<script src="<?php echo e(cdn('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(cdn('plugins/markdown/js/editormd.min.js')); ?>"></script>
<script type="text/javascript">
    var testEditor;
    $(function() {
        testEditor = editormd("test-editormd", {
            width: "90%",
            height: 640,
            syncScrolling: "single",
            path: "../plugins/markdown/lib/"
        });
    });
</script>
</body>
</html>