<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16-11-11
 * Time: 下午3:08
 */

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\modules\admin\assets\SystemAsset;
SystemAsset::register($this);

$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <title>HOST数据管理后台</title>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
    <?php $this->beginBody() ?>
    <header class="header">
        <a href="index.html" class="logo">HOST数据管理后台</a>
        <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <a class="logo navbar-right" target="_blank" href="/">系统前台</a>
        <div class="navbar-right">
        <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i>
                <span><?= Yii::$app->admin->identity->account_name ?> <i class="caret"></i></span>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header bg-light-blue">
                    <img src="/system/image/avatar3.png" class="img-circle" alt="User Image" />
                    <p>
                        <?= Yii::$app->admin->identity->account_name ?> - Web Developer
                        <small>Member since Jul. 2017</small>
                    </p>
                </li>
                <li class="user-footer">
                    <div class="pull-left">
                        <a href="/admin/manager/view/<?= Yii::$app->admin->getId() ?>" class="btn btn-default btn-flat">个人信息</a>
                    </div>
                    <div class="pull-right">
                        <?= Html::beginForm(['/admin/manager/logout'], 'post', ['class' => ''])
                        . Html::submitButton(
                            '退出 (' . Yii::$app->admin->identity->username . ')',
                            ['class' => 'btn btn-default btn-flat',]
                        )
                        . Html::endForm()
                        ?>
                    </div>
                </li>
            </ul>
        </li>
        </ul>
        </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="/system/image/avatar3.png" class="img-circle" alt="User Image" />
                    </div>
                    <div class="pull-left info">
                        <p>您好, <?= Yii::$app->admin->identity->account_name ?></p>

                        <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
                    </div>
                </div>

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="active">
                        <a href="/admin">
                            <i class="fa fa-dashboard"></i> <span>仪表板</span>
                            <small class="badge pull-right bg-yellow">仪表板</small>
                        </a>
                    </li>

                    <li class="treeview <?= in_array($controller, ['manager']) ? 'active' : '' ?>">
                        <a href="#">
                            <i class="fa fa-group"></i> <span>管理员管理</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li <?= $controller=='manager' ? 'class="active"' : '' ?>>
                                <a href="<?= \yii\helpers\Url::to(['/admin/manager'])?>">
                                    <i class="fa fa-angle-double-right"></i> 管理员</a></li>
                        </ul>
                    </li>


                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cogs"></i> <span>系统管理</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= \yii\helpers\Url::to(['/admin/manager/index'])?>"><i class="fa fa-angle-double-right"></i> 账户管理</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['/admin/manager/index'])?>"><i class="fa fa-angle-double-right"></i> 系统设置</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['/admin/manager/index'])?>"><i class="fa fa-angle-double-right"></i> 权限管理</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="pages/widgets.html">
                            <i class="fa fa-th"></i> <span>Widgets</span> <small class="badge pull-right bg-green">new</small>
                        </a>
                    </li>
                    <li>
                        <a href="pages/calendar.html">
                            <i class="fa fa-calendar"></i> <span>Calendar</span>
                            <small class="badge pull-right bg-red">3</small>
                        </a>
                    </li>
                    <li>
                        <a href="pages/mailbox.html">
                            <i class="fa fa-envelope"></i> <span>Mailbox</span>
                            <small class="badge pull-right bg-yellow">12</small>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder"></i> <span>Examples</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="pages/examples/invoice.html"><i class="fa fa-angle-double-right"></i> Invoice</a></li>
                            <li><a href="pages/examples/login.html"><i class="fa fa-angle-double-right"></i> Login</a></li>
                            <li><a href="pages/examples/register.html"><i class="fa fa-angle-double-right"></i> Register</a></li>
                            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-angle-double-right"></i> Lockscreen</a></li>
                            <li><a href="pages/examples/404.html"><i class="fa fa-angle-double-right"></i> 404 Error</a></li>
                            <li><a href="pages/examples/500.html"><i class="fa fa-angle-double-right"></i> 500 Error</a></li>
                            <li><a href="pages/examples/blank.html"><i class="fa fa-angle-double-right"></i> Blank Page</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <?= \yii\widgets\Breadcrumbs::widget([
                    'homeLink'=>['label' => ' 仪表板','url' => '/admin', 'target'=>'_top', 'class' => 'fa fa-dashboard'],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </section>

            <!-- Main content -->
            <section class="content">
                <?= $content ?>

            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>