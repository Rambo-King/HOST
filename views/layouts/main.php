<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);

$categories = \app\models\Category::TopCategory();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div id="navigation" class="navigation">
    <div id="navi-left" class="navi-left">
        <ul>
            <li id="logo"><a href="<?= \Yii::$app->request->hostInfo ?>" target="_self"><img src="/images/logo.png" width="250" height="55" alt="后路哥-主机服务" longdesc="http://houluge.com/" /></a></li>
            <li><a href="/" title="首页" target="_self">首页</a></li>
            <?php foreach($categories as $v): ?>
                <li><a href="/host/cate/<?= $v['category_id'] ?>" title="台湾云主机" target="_self"><?= $v['name'] ?></a></li>
            <?php endforeach; ?>
            <!--<li><a href="http://speedtest.houluge.com/" title="测速" target="_blank">测速</a></li>-->
        </ul>
    </div>
    <div id="navi-right" class="navi-right">
        <ul>
            <li><a href="tel:18631982331">电话：18631982331</a> - QQ：397341123</li>
        </ul>
    </div>
</div>

<?= $content ?>

<div id="bottom" class="bottom">Copyright &copy; 2012-2017 Houluge Network Limited. All Rights Reserved.<br>
    <a href="/home/about/" title="关于后路哥" target="_self">关于我们</a> /
    <a href="/home/service" target="_self">服务条款</a> /
    <a href="/home/pay/" target="_self">支付方式</a> /
    <a href="/home/contact/" target="_self">联系我们</a> /
    <a href="javascript:;" target="_blank">博客</a> /
    <a href="javascript:;" target="_blank">促销及公告</a><br>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
