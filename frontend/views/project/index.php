<?php
use common\models\Project;
/* @var $this \yii\web\View */
/* @var $models Project */
/* @var $model Project */

$this->title = Yii::t('app', 'Проекты');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['project/index']];
?>
<h1><?= $this->title ?></h1>
<div class="project-list">
    <?php foreach ($models as $model): ?>
        <a class="project-list__item" href="<?= \yii\helpers\Url::to(['project/list', 'id' => $model->id]) ?>">
            <img src="<?= $model->getImage() ?>" alt="<?= $model->name ?>">
        </a>
    <?php endforeach; ?>
</div>