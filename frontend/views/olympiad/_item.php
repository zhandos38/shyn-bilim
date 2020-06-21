<?php
/* @var $model \common\models\Subject */

?>
<div class="olympiad-card">
    <a class="olympiad-card__link" href="<?= \yii\helpers\Url::to(['olympiad/assignment', 'subject' => $model->id]) ?>">
        <img class="olympiad-card__img" src="<?= $model->img ?>" alt="<?= $model->name ?>">
    </a>
</div>
