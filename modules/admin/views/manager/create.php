<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Manager */

$this->title = '创建管理员';
$this->params['breadcrumbs'][] = ['label' => '管理员', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manager-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="manager-form">

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

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password2')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'account_name')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <div class="col-xs-2 col-xs-offset-2">
                <?= Html::submitButton('创建', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
