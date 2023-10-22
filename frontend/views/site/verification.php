<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model LoginForm */

use common\models\LoginForm;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Телефон номерді растау';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container rbt-section-gapTop rbt-section-gapBottom">
    <div class="verification-container">
        <h4><?= $this->title ?></h4>

        <?php $form = ActiveForm::begin([
            'id' => 'verification-form',
            'fieldConfig' => [
                'template' => '{input}<div class="txt_inp">{label}</div>{error}',
            ],
        ]); ?>

        <p>
            Көрсетілген номерге смс кодпен жіберілді, тіркелуді аяқтау үшін смс-тегі коды енгізуді сұраймыз
        </p>

        <?= $form->field($model, 'code') ?>

        <?= Html::submitButton('Растау', ['class' => 'rbt-btn btn-gradient', 'name' => 'verification-button', 'style' => 'width: 100%']) ?>

        <p>
            Смс келмеді ма? <a id="resend-btn" href="#" class="block-disabled">Қайта жіберу <span id="timer-wrapper"><span id="timer">60</span> сек</span></a>
        </p>

        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php
$js = <<<JS
let timer = $('#timer');
let timerWrapper = $('#timer-wrapper');
let resendBtn = $('#resend-btn');

countTimer();
resendBtn.click(function() {
    $.post({
        url: '/kz/site/resend-verification-code',
        success: function(result) {
            console.log(result);
        },
        error: function() {
            console.log('Resend message error!');
        }
    });
    
  countTimer();
});

function countTimer() {
    resendBtn.addClass('block-disabled');
    let timerCount = 60;
    timer.html(timerCount);
    timerWrapper.show();
    
    let interval = setInterval(function() {
        timer.html(--timerCount);
        if (timerCount === 0) {
            clearInterval(interval);
            resendBtn.removeClass('block-disabled');
            timerWrapper.hide();
            timer.html('');
        }
    }, 1000);
}
JS;

$this->registerJs($js);
?>
