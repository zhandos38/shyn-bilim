<?php
use yii\helpers\Url;
use common\models\Subject;

/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Олимпиады');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['olympiad/index']];
?>
<div class="olympiad-index" style="padding-bottom: 80px">
    <h1><?= $this->title ?></h1>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= Yii::t('app', 'Для учеников') ?></h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="<?= Url::to(['olympiad/list', 'type' => Subject::TYPE_STUDENT]) ?>" class="btn btn-primary"><?= Yii::t('app', 'Перейти') ?></a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= Yii::t('app', 'Для преподавателей') ?></h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="<?= Url::to(['olympiad/list', 'type' => Subject::TYPE_TEACHER]) ?>" class="btn btn-primary"><?= Yii::t('app', 'Перейти') ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
