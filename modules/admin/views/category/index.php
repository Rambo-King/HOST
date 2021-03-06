<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '主机分类';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <?php
    if(Yii::$app->session->hasFlash('success')){
        echo '<div class="alert alert-success">'.Yii::$app->session->getFlash('success').'</div>';
    }
    ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('创建分类', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => \yii\grid\CheckboxColumn::className()],

            'category_id',
            'parent_id',
            'name',
            /*'cover',
            'description:ntext',
            'test_ip',
            'note:ntext',
            'summary',
            'level',*/
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
                        }
                ],
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
                $.post('/admin/category/ajax-delete', {'id':obj.getAttribute('data-id')}, function(data){
                    if(data.status){
                        window.location.href = '/admin/category';
                    }else{
                        layer.open({
                            skin: 'layui-layer-lan',
                            shift: 1,
                            title:'温馨提示',
                            content:data.msg,
                            btn:['确定'],
                            yes:function (index) {
                                layer.close(index);
                            }
                        });
                    }
                }, 'json');
            },
            no:function(index){
                layer.close(index);
            }
        });
    }
</script>