<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\OtherAsset;

OtherAsset::register($this);

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

<nav class="navbar navbar-default met-nav " role="navigation">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle hamburger hamburger-close collapsed" data-target="#navbar-default-collapse" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="hamburger-bar"></span>
                </button>
                <a href="/" class="navbar-brand navbar-logo vertical-align" title="科技公司">
                    <h1 class="hide">科技公司</h1>
                    <div class="vertical-align-middle"><img src="/images/1464062976.png" alt="科技公司" title="科技公司"></div>
                </a>
                <h2 class="hide"></h2>
            </div>
            <div class="collapse navbar-collapse navbar-collapse-toolbar nav-shop" id="navbar-default-collapse">
                <ul class="nav navbar-nav navbar-right navlist">
                    <li><a href="/" title="首页" class="link active">首页</a></li>
                    <?php foreach($categories as $v): ?>
                        <li><a href="/host/cate/<?= $v['category_id'] ?>" title="台湾云主机" target="_self"><?= $v['name'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</nav>

<?= $content ?>

<div class="met-footnav text-center">
    <div class="container">
        <div class="row mob-masonry">
            <div class="col-md-2 col-sm-3 col-xs-6 list masonry-item">
                <h4><a href="product/" title="产品">产品</a></h4>
                <ul>
                    <li><a href="#" title="智能手表">智能手表</a></li>
                    <li><a href="#" title="智能眼镜">智能眼镜</a></li>
                    <li><a href="#" title="机器人">机器人</a></li>
                    <li><a href="#" title="体感车">体感车</a></li>
                    <li><a href="#" title="无人机">无人机</a></li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6 list masonry-item">
                <h4><a href="#" title="支持">支持</a></h4>
                <ul>
                    <li><a href="#" title="售后政策">售后政策</a></li>
                    <li><a href="#" title="相关下载">相关下载</a></li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6 list masonry-item">
                <h4><a href="#" title="博客">博客</a></h4>
                <ul>
                    <li><a href="#" title="产品资讯">产品资讯</a></li>
                    <li><a href="#" title="行业动态">行业动态</a></li>
                    <li><a href="#" title="国际资讯">国际资讯</a></li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6 list masonry-item">
                <h4><a href="#" title="关于">关于</a></h4>
                <ul>
                    <li><a href="#" title="关于我们">关于我们</a></li>
                    <li><a href="#" title="联系我们">联系我们</a></li>
                    <li><a href="#" title="加入我们">加入我们</a></li>
                    <li><a href="#" title="意见反馈">意见反馈</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-ms-12 col-xs-12 info masonry-item">
                <em><a href="tel:400-000-000" title="400-000-000">400-000-000</a></em>
                <p>周一至周五 08:30~17:30</p>
                <a id="met-weixin"><i class="fa fa-weixin light-green-700" data-plugin="webuiPopover" data-trigger="hover" data-animation="pop" data-placement="top" data-width="160" data-padding="0" data-content="&lt;img src='upload/201605/1464081530.jpg' alt='科技公司网站模板|科技公司企业网站模板-科技公司' style='width: 150px;display:block;margin:auto;'&gt;"></i></a>
                <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=&amp;site=qq&amp;menu=yes" rel="nofollow" target="_blank">
                    <i class="fa fa-qq"></i>
                </a>
                <a href="" rel="nofollow" target="_blank"><i class="fa fa-weibo red-600"></i></a>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="container text-center">
        <p>科技公司 版权所有 &copy; 2008-2016 湘ICP备8888888 </p>
        <p>本页面内容为网站演示数据，前台页面内容都可以在后台修改。</p>
        <div class="powered_by_metinfo">Powered&nbsp;by&nbsp;<a href="http://www.MetInfo.cn/#copyright" target="_blank" title="企业网站管理系统">MetInfo</a>&nbsp;5.3.16</div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
