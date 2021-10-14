<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['site/login']];
$this->params['heroTitle'] = $this->title;
$this->params['heroDescription'] = Yii::t('app', 'Заполните форму чтобы войти в свой аккаунт');
?>
<div class="site-login">
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'iin')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    <?= Yii::t('app', 'У вас нет аккаунта?') ?> <b><?= Html::a(Yii::t('app', 'Зарегистрироватся'), ['site/signup']) ?></b>
                    <br>
                    <?= Yii::t('app', 'Если забыли свой пароль') ?>. <b><?= Html::a(Yii::t('app', 'Восстановить'), ['site/request-password-reset']) ?></b>
                    <br>
                    <?= Yii::t('app', 'Не получили письмо подтверждение?') ?> <b><?= Html::a(Yii::t('app', 'Переотправить'), ['site/resend-verification-email']) ?></b>
                </div>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Войти'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
