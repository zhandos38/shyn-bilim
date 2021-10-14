<?php

use common\models\Olympiad;
use yii\helpers\Url;
use common\models\Subject;

/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Олимпиады');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['olympiad/index']];
$this->params['heroTitle'] = $this->title;
$this->params['heroDescription'] = 'БІЛІМ ШЫҢЫ - ҒЫЛЫМ СЫРЫ';
?>
<div class="olympiad-index mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <a href="<?= Url::to(['olympiad/index', 'type' => Olympiad::TYPE_TEACHER]) ?>">
                <div class="feature-box padding-4-half-rem-tb padding-4-rem-lr bg-white box-shadow-small box-shadow-extra-large-hover md-padding-3-rem-all sm-padding-5-rem-all border-top border-width-4px border-color-fast-blue">
                    <div class="feature-box-icon">
                        <i class="line-icon-Teacher icon-large text-fast-blue margin-35px-bottom md-margin-15px-bottom sm-margin-10px-bottom"></i>
                    </div>
                    <div class="feature-box-content last-paragraph-no-margin">
                        <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray text-extra-medium"><?= Yii::t('app', 'Олимпиада для преподавателей') ?></span>
                        <p><?= Yii::t('app', 'Уникальная возможность показать все грани образования и квалификации!') ?></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="<?= Url::to(['olympiad/index', 'type' => Olympiad::TYPE_STUDENT]) ?>">
                <div class="feature-box padding-4-half-rem-tb padding-4-rem-lr bg-white box-shadow-small box-shadow-extra-large-hover md-padding-3-rem-all sm-padding-5-rem-all border-top border-width-4px border-color-fast-blue">
                    <div class="feature-box-icon">
                        <i class="line-icon-Students icon-large text-fast-blue margin-35px-bottom md-margin-15px-bottom sm-margin-10px-bottom"></i>
                    </div>
                    <div class="feature-box-content last-paragraph-no-margin">
                        <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray text-extra-medium"><?= Yii::t('app', 'Олимпиада для учеников') ?></span>
                        <p><?= Yii::t('app', 'Не просто проверить знания, а познавать новые знание, знать ответ. Получить заслуженную награду.') ?></p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
