<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = '编辑产品: ' . $model->product_id;
$this->params['breadcrumbs'][] = ['label' => '主机产品', 'url' => ['index']];
$this->params['breadcrumbs'][] = '编辑';
?>
<div class="product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="product-form">

        <?php $form = ActiveForm::begin([
            'enableAjaxValidation' => false,
            'options' => [
                'class'=>'form-horizontal',
                'enctype' => 'multipart/form-data',
            ],
            'fieldConfig' => [
                'template' => '{label}<div class="col-xs-7">{input}</div><div class="col-xs-3">{error}</div>',
                'labelOptions' => ['class' => 'col-xs-1 control-label'],
            ],
        ]); ?>

        <?= $form->field($model, 'category_id')->dropDownList(\app\models\Category::Product()) ?>

        <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'cpu')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'memory')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'disk')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'bandwidth')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ip_count')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'operating_system')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'has_ipmi')->dropDownList([1 => '有', 0 => '无'], ['prompt' => '请选择'])  ?>

        <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'uri')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <div class="col-xs-1 col-xs-offset-1">
                <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
