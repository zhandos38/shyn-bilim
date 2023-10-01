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
    <div class="row justify-content-center rbt-section-gapTop rbt-section-gapBottom">
        <div class="col-lg-8">
            <div class="login-container sal-animate" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800">
                <div class="row">
                    <div class="col-lg-6" style="background-image: url('/img/celebration-gradient.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat">

                    </div>
                    <div class="col-lg-6 p-5">
                        <h4 class="text-center">Вход</h4>
                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                        <?= $form->field($model, 'iin')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <div style="color:#999;margin:1em 0">
                            <?= Yii::t('app', 'У вас нет аккаунта?') ?> <b><?= Html::a(Yii::t('app', 'Зарегистрироватся'), ['site/signup']) ?></b>
                        </div>

                        <div class="form-group">
                            <?= Html::submitButton(Yii::t('app', 'Войти'), ['class' => 'rbt-btn btn-md btn-gradient hover-icon-reverse w-100', 'name' => 'login-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .login-container {
        background: var(--color-white);
        transition: 0.3s;
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow-1);
        height: 100%;
    }
</style>