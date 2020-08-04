<?php
use common\models\Project;
/* @var $this \yii\web\View */
/* @var $models Project */
/* @var $model Project */

$this->title = Yii::t('app', 'Проекты');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['project/index']];
?>
<div class="project-info" style="text-align: center">
    <h2>Құрметті педагог!</h2>
    <h4>BILIMSHINI.KZ  ИНТЕРНЕТ ПОРТАЛЫ</h4>
    <p>Сіздің жұмыс нәтижелеріңізді, жетістіктеріңізді республика көлемінде жариялап,
        жемісті еңбегіңізді таныту үшін түрлі байқаулар ұйымдастыруда. </p>
    <p style="font-weight: 600">
        БІЗ СІЗГЕ ӘРҚАШАН ШЫҒАРМАШЫЛЫҚ ҚОЛДАУ КӨРСЕТУГЕ ДАЙЫНБЫЗ!
    </p>
    <p>
        Байқауға қатысып, өз шығармашылық жұмысыңызды Республика көлемінде жариялауға шақырамыз.
    </p>
    <p>
        ШҰҒЫЛ түрде қабылдаймыз! Толық ереже мәтінін <a href="tel:87750767876">8(775) 076-78-76</a> <br>
        номерлі <a href="https://wa.me/77754037284">https://wa.me/87750767876</a> сілтемесінен алуыңызға болады.
    </p>
</div>
<div class="project-list">
    <?php foreach ($models as $model): ?>
        <a class="project-list__item" href="<?= \yii\helpers\Url::to(['project/list', 'id' => $model->id]) ?>">
            <img src="<?= $model->getImage() ?>" alt="<?= $model->name ?>">
        </a>
    <?php endforeach; ?>
</div>