<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '主机产品';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <?php
    if(Yii::$app->session->hasFlash('success')){
        echo '<div class="alert alert-success">'.Yii::$app->session->getFlash('success').'</div>';
    }
    ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('创建产品', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => \yii\grid\CheckboxColumn::className()],

            'product_id',
            [
                'attribute' => 'category_id',
                'value' => function($m){
                        return \app\models\Category::GetCategoryName($m->category_id);
                    }
            ],
            'type',
            'cpu',
            'memory',
            'disk',
            'bandwidth',
            'ip_count',
            'operating_system',
            [
                'attribute' => 'has_ipmi',
                'format' => 'raw',
                'headerOptions' => ['width' => '80'],
                'filter' => [1 => '有', 0 => '无'],
                'value' => function($m){
                        //return $m->has_ipmi == 1 ? '<i class="fa fa-check-circle"></i>' : '<i class="fa fa-times-circle"></i>';
                        return isset($m->has_ipmi) ? ($m->has_ipmi == 1 ? '有' : '无') : null;
                    }
            ],
            'price',
            'position',
            'uri',
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
                $.post('/admin/product/ajax-delete', {'id':obj.getAttribute('data-id')}, function(bool){
                    if(bool){
                        window.location.href = '/admin/product';
                    }
                });
            },
            no:function(index){
                layer.close(index);
            }
        });
    }
</script>
