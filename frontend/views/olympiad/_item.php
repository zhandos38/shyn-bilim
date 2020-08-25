<?php
/* @var $model \common\models\Subject */

?>
<a class="subject-list__item" href="<?= \yii\helpers\Url::to(['olympiad/assignment', 'subject' => $model->id]) ?>">
    <span><?= $model->name ?></span>
</a>
