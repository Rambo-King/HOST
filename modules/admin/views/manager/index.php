<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ManagerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '管理员';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manager-index">

    <?php
    if(Yii::$app->session->hasFlash('success')){
        echo '<div class="alert alert-success">'.Yii::$app->session->getFlash('success').'</div>';
    }
    ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('创建管理员', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => \yii\grid\CheckboxColumn::className()],

            'manager_id',
            'username',
            /*'password',
            'auth_key',
            'access_token',*/
            'account_name',
            'created_at:datetime',
            'updated_at:datetime',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'headerOptions' => ['width' => '142'],
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function($url, $model, $key){
                            return Html::a("修改", \yii\helpers\Url::to($url), ["class" => "btn btn-primary"]);
                        },
                    'delete' => function($url, $model, $key){
                            return '<a data-id="'.$key.'" onclick="DeleteConfirm(this);" href="javascript:;" class="btn btn-danger">删除</a>';
                        },
                ],
            ],
            [
                'label' => '其他操作',
                'format' => 'raw',
                'value' => function($m){
                        return Html::a("更改密码", \yii\helpers\Url::to(['/admin/manager/password', 'id' => "{$m->manager_id}"]), ["class" => "btn btn-success"]);
                    }
            ],
        ],
    ]); ?>
</div>

<script type="text/javascript">
    function DeleteConfirm(obj){
        layer.open({
            skin: 'layui-layer-lan',
            shift: 1,
            title:'温馨提示',
            content:'删除后不可恢复, 请谨慎操作 ?',
            btn:['确定', '取消'],
            yes:function(){
                $.post('/admin/manager/ajax-delete', {'id':obj.getAttribute('data-id')}, function(bool){
                    if(bool){
                        window.location.href = '/admin/manager';
                    }
                });
            },
            no:function(index){
                layer.close(index);
            }
        });
    }
</script>