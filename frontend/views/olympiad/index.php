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
            <?php foreach ($olympiads as $olympiad): ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $olympiad->name ?></h5>
                    <a href="<?= Url::to(['olympiad/view', 'id' => $olympiad->id]) ?>" class="btn btn-primary"><?= Yii::t('app', 'Перейти') ?></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
