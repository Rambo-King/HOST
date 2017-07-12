<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '简单内容';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">
    <?php
    if(Yii::$app->session->hasFlash('success')){
        echo '<div class="alert alert-success">'.Yii::$app->session->getFlash('success').'</div>';
    }
    ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('创建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => \yii\grid\CheckboxColumn::className()],

            'page_id',
            'title',
            //'content:ntext',
            //'note:ntext',
            //'cover',
            'created_at:datetime',
            'updated_at:datetime',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'headerOptions' => ['width' => '142'],
                //'template' => '{update} {delete}',
                'template' => '{update}',
                'buttons' => [
                    'update' => function($url, $model, $key){
                            return Html::a("修改", \yii\helpers\Url::to($url), ["class" => "btn btn-primary"]);
                        },
                    /*'delete' => function($url, $model, $key){
                            return '<a data-id="'.$key.'" onclick="DeleteConfirm(this);" href="javascript:;" class="btn btn-danger">删除</a>';
                        }*/
                ],
            ],
        ],
    ]); ?>
</div>
