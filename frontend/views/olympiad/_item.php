<?php
/* @var $model \common\models\Subject */

?>
<a class="olympiad-item" href="<?= \yii\helpers\Url::to(['olympiad/assignment', 'subject' => $model->id]) ?>">
    <span><?= $model->name ?></span>
</a>
