<?php
use yii\helpers\Url;
use common\models\Subject;

/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Олимпиады');
$this->params['breadcrumbs'][] = ['label' => 'Выбор типа олимпиады', 'url' => ['olympiad/choose']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['olympiad/index']];
$this->params['heroTitle'] = $this->title;
$this->params['heroDescription'] = 'БІЛІМ ШЫҢЫ - ҒЫЛЫМ СЫРЫ';
?>
<div class="bg-gradient-5">
    <div class="container pt--60">
        <div class="section-title text-center mb--30">
            <h2 class="title">Олимпиада оқушылар</h2>
        </div>
        <div class="row justify-content-center">
            <?php /** @var \common\models\Olympiad $olympiad */
            foreach ($studentOlympiads as $olympiad): ?>
                <div class="col-md-3">
                    <div class="menu-card">
                        <a href="<?= Url::to(['olympiad/assignment', 'id' => $olympiad->id]) ?>">
                            <div>
                                <div>
                                    <img class="menu-card__img" src="<?= $olympiad->getImage() ?>" alt="menu-icon">
                                </div>
                                <div class="menu-card__text-box">
                                    <h5 class="mb--10"><?= $olympiad->name ?></h5>
                                    <a href="<?= $olympiad->getFile() ?>" class="rbt-btn-link"><?= Yii::t('app', 'Положение') ?></a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="container pt--60 pb--60">
        <div class="section-title text-center mb--30">
            <h2 class="title">Олимпиада мұғалімдер</h2>
        </div>
        <div class="row justify-content-center">
            <?php /** @var \common\models\Olympiad $olympiad */
            foreach ($teacherOlympiads as $olympiad): ?>
                <div class="col-md-3">
                    <div class="menu-card">
                        <a href="<?= Url::to(['olympiad/assignment', 'id' => $olympiad->id]) ?>">
                            <div>
                                <div>
                                    <img class="menu-card__img" src="<?= $olympiad->getImage() ?>" alt="menu-icon">
                                </div>
                                <div class="menu-card__text-box">
                                    <h5 class="mb--10"><?= $olympiad->name ?></h5>
                                    <a href="<?= $olympiad->getFile() ?>" class="rbt-btn-link"><?= Yii::t('app', 'Положение') ?></a>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<style>
    .menu-card__img {
        height: 120px;
    }
</style>
