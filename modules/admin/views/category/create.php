<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = '创建分类';
$this->params['breadcrumbs'][] = ['label' => '主机分类', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="category-form">

        <?php $form = ActiveForm::begin([
            'enableAjaxValidation' => true,
            'options' => [
                'class'=>'form-horizontal',
                'enctype' => 'multipart/form-data',
            ],
            'fieldConfig' => [
                'template' => '{label}<div class="col-xs-4">{input}</div><div class="col-xs-5">{error}</div>',
                'labelOptions' => ['class' => 'col-xs-2 control-label'],
            ],
        ]); ?>

        <?= $form->field($model, 'parent_id')->textInput() ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'cover')->textInput(['maxlength' => true, 'ckfinder' => 'modal', 'readonly' => true]) ?>

        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'test_ip')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'level')->textInput() ?>

        <div class="form-group">
            <div class="col-xs-2 col-xs-offset-2">
            <?= Html::submitButton('创建', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
