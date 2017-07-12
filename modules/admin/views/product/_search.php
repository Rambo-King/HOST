<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'cpu') ?>

    <?= $form->field($model, 'memory') ?>

    <?php // echo $form->field($model, 'disk') ?>

    <?php // echo $form->field($model, 'bandwidth') ?>

    <?php // echo $form->field($model, 'ip_count') ?>

    <?php // echo $form->field($model, 'operating_system') ?>

    <?php // echo $form->field($model, 'has_ipmi') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'position') ?>

    <?php // echo $form->field($model, 'uri') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
