<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Page */

$this->title = '创建';
$this->params['breadcrumbs'][] = ['label' => '简单页', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="page-form">

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

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'content')->widget(\dosamigos\ckeditor\CKEditor::className(), [
            'preset' => 'standard', //standard basic full
            'clientOptions' => [
                'filebrowserBrowseUrl' => \yii\helpers\Url::to(['@web/plugins/ckfinder/ckfinder.html']),
                'filebrowserImageBrowseUrl' => \yii\helpers\Url::to('@web/plugins/ckfinder/ckfinder.html'),
            ],
        ]) ?>

        <?= $form->field($model, 'note')->widget(\dosamigos\ckeditor\CKEditor::className(), [
            'preset' => 'standard', //standard basic full
            'clientOptions' => [
                'filebrowserBrowseUrl' => \yii\helpers\Url::to(['@web/plugins/ckfinder/ckfinder.html']),
                'filebrowserImageBrowseUrl' => \yii\helpers\Url::to('@web/plugins/ckfinder/ckfinder.html'),
            ],
        ]) ?>

        <?= $form->field($model, 'cover')->textInput(['maxlength' => true, 'ckfinder' => 'modal', 'readonly' => true]) ?>

        <div class="form-group">
            <div class="col-xs-1 col-xs-offset-1">
                <?= Html::submitButton('创建', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>

    </div>

</div>
