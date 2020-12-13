<?php
use yii\helpers\Url;
use common\models\Subject;

/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Олимпиады');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['olympiad/index']];
?>
<div class="olympiad-index" style="padding-bottom: 80px">
    <h1><?= $this->title ?></h1>
    <ul class="card-list">
        <?php /** @var \common\models\Olympiad $olympiad */
        foreach ($olympiads as $olympiad): ?>
            <li class="card">
                <a class="card-image" href="<?= Url::to(['olympiad/view', 'id' => $olympiad->id]) ?>" style="background-image: url(<?= htmlspecialchars($olympiad->getImage()) ?>);" data-image-full="<?= $olympiad->getImage() ?>">
                    <img src="<?= $olympiad->getImage() ?>" alt="Olympiad" />
                </a>
                <a class="card-description" href="<?= Url::to(['olympiad/view', 'id' => $olympiad->id]) ?>">
                    <h6><?= $olympiad->name ?></h6>
                    <p><?= $olympiad->getType() ?></p>
                </a>
                <div class="d-flex">
                    <a class="btn btn-info w-50 rounded-0" href="<?= $olympiad->getFile() ?>"><i class="fa fa-download"></i> <?= Yii::t('app', 'Правила') ?></a>
                    <a class="btn btn-success w-50 rounded-0" href="<?= Url::to(['olympiad/view', 'id' => $olympiad->id]) ?>"><i class="fa fa-sign-in"></i> <?= Yii::t('app', 'Войти') ?></a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
