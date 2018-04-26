<!DOCTYPE html>
<html lang="zh-CN"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>历史记录</title>
    <link href="<?=STATIC_PATH?>css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .title{height:50px;line-height: 50px;background:#d9edf7;text-indent: 2em; }
        .v_content{background:#f8f8f8;}
        .glyphicon-calendar{font-size:18px;}
        .media-left{width:200px;}
        .media-body{width:1000px;}
        .commit-row-info{width:800px;float:left;}
        .dictionary{width:140px;float:right;line-height:15px;text-align:center;}
        hr{margin:5px 0;}
    </style>
</head>
<body>
<?php $this->navActive='Log';$this->import('nav');?>
<div class="container">
    <div class="bs-example bg-white" style="padding:10px;" data-example-id="media-alignment">
        <?php if($this->data):?>
    	<?php foreach($this->data as $date=>$item):?>
        <div class="media">
            <div class="media-left">
                <p><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <i> <?=$date?></i></p>
                <p class="text-primary">共<?=count($item)?>次调整</p>
            </div>
            <div class="media-body">
                <?php foreach($item as $log):?>
                <div class="commit-row-info">
                    <b class="media-heading"><a href="<?=U("Log", "details", array('id'=>$log['id']))?>"><?=$log['message']?></b>
                    <p class="text-muted"><a href="mailto:<?=$log['email']?>?subject=Re<<?=$log['id']?>>: <?=$log['message']?>" class="text-success" title="<?=$log['email']?>"><?=$log['name']?></a> 在 <?=getTimeFormatText($log['dateline'])?> 调整</p>
                </div>
                <div class="dictionary">
                    <?php if(!$log["init_commit"]):?>
                        <p>
                            <a href="<?=U("Log", "diffLog", array('id'=>$lastLog['id']))?>">变更对比</a>
                            <a href="<?=U("Sql", "index", array('id'=>$log['id']))?>">建表SQL</a>
                        </p>
                        <p><a href="<?=U("Index", "dictionary", array('id'=>$lastLog['id']))?>">数据字典</a></p>
                    <?php else: ?>
                    <p>
                        <a href="<?=U("Log", "diffLog", array('id'=>$log['id']))?>">变更对比</a>
                        <a href="<?=U("Log", "rollback", array('id'=>$log['id']))?>">回滚到</a>
                    </p>
                    <p>
                        <a href="<?=U("Index", "dictionary", array('id'=>$log['id']))?>">数据字典</a>
                        <a href="<?=U("Sql", "index", array('id'=>$log['id']))?>">建表SQL</a>
                    </p>
                    <?php endif;?>
                </div>
                <div class="clearfix"></div>
                <hr />
                <?php endforeach;?>
            </div>
        </div>
        <hr>
        <?php endforeach;?>
        <nav style="text-align: center">
            <ul class="pagination pagination-lg">
            <?=$this->page?>
            </ul>
        </nav>
        <?php else: ?>
        <p style="text-align: center;margin-top:100px;font-size:18px;">暂时没有版本历史记录</p>
        <?php endif; ?>
</div><!-- /.container -->
<script src="<?=STATIC_PATH?>js/bootstrap.min.js"></script>
</body></html>