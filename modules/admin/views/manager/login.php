<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'HOST 数据管理';
?>
<div class="site-login">
    <div class="container">

        <div class="jumbotron">
            <h1>欢迎</h1>
            <h2><?= Html::encode($this->title) ?></h2>
        </div>

        <div class="login-form center-block">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{beginWrapper}\n{input}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        'wrapper' => 'col-sm-12',
                        'offset' => '',
                    ],
                ],
                'errorCssClass' => '',
                'successCssClass' => 'has-success',
            ]); ?>

            <?= $form->errorSummary($model, ['header' => '']) ?>

            <?= $form->field($model, 'username')->textInput(['placeholder' => '用户名', 'autocomplete' => 'off']) ?>

            <?= $form->field($model, 'password')->passwordInput(['placeholder' => '密码']) ?>

            <?= $form->field($model, 'verifyCode', ['options' => ['class' => 'form-group verifycode']])->widget(\yii\captcha\Captcha::className(), [
                'captchaAction' => 'manager/captcha',
                'template' => '{input} {image}',
                'options' => ['class' => 'form-control', 'placeholder' => '请输入验证码' ],
            ]) ?>

            <div class="form-group">
                <div class="col-sm-12">
                    <?= Html::submitButton('立即登录', ['class' => 'btn btn-success btn-lg btn-block', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>
</div>

<?php
$script = <<<JS
    $('#managerloginform-username').focus(function(){
        $('#managerloginform-password').val('');
    });
JS;
$this->registerJs($script);
?>
