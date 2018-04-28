<!DOCTYPE html>
<html lang="zh-CN"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>建表SQL</title>
    <link type="text/css" href="<?=STATIC_PATH?>highlight/styles/solarized-dark.css" rel="stylesheet" />
    <link href="<?=STATIC_PATH?>css/bootstrap.min.css" rel="stylesheet">
</head>
<body onload="hljs.initHighlighting()">
<?php $this->navActive='Sql';$this->import('nav');?>
<div class="container">
    <p style="text-align: right;">
        <a href="<?=U("Log","diffLog", array('id'=>$_GET['id']))?>" class="btn btn-default">查看版本变更</a>
        <button class="btn btn-default clipboard"  data-clipboard-target="#sql">拷贝全部</button>
    </p>
    <div class="bs-example bg-white"  data-example-id="media-alignment">
    <pre><code class="hljs sql" id="sql"><?=$this->sql?></code></pre>
    </div>
</div><!-- /.container -->
<script src="<?=STATIC_PATH?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=STATIC_PATH?>highlight/highlight.pack.js"></script>
<script src="<?=STATIC_PATH?>js/clipboard.min.js"></script>
<script>
    var clipboard = new ClipboardJS('.clipboard');
    clipboard.on('success', function(e) {
        alert("拷贝成功！")
        e.clearSelection();
    });

    clipboard.on('error', function(e) {
        alert("拷贝失败，请尝试手动拷贝！")
    });
</script>
</body></html>

