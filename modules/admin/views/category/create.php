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

        <?= $form->field($model, 'parent_id')->dropDownList(\app\models\Category::Category()) ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'cover')->textInput(['maxlength' => true, 'ckfinder' => 'modal', 'readonly' => true]) ?>

        <?= $form->field($model, 'description')->widget(\dosamigos\ckeditor\CKEditor::className(), [
            'preset' => 'standard', //standard basic full
            'clientOptions' => [
                'filebrowserBrowseUrl' => \yii\helpers\Url::to(['@web/plugins/ckfinder/ckfinder.html']),
                'filebrowserImageBrowseUrl' => \yii\helpers\Url::to('@web/plugins/ckfinder/ckfinder.html'),
            ],
        ]) ?>

        <?= $form->field($model, 'test_ip')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'note')->widget(\dosamigos\ckeditor\CKEditor::className(), [
            'preset' => 'standard', //standard basic full
            'clientOptions' => [
                'filebrowserBrowseUrl' => \yii\helpers\Url::to(['@web/plugins/ckfinder/ckfinder.html']),
                'filebrowserImageBrowseUrl' => \yii\helpers\Url::to('@web/plugins/ckfinder/ckfinder.html'),
            ],
        ]) ?>

        <?= $form->field($model, 'summary')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <div class="col-xs-1 col-xs-offset-1">
            <?= Html::submitButton('创建', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
