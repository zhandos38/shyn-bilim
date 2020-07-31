<?php
/* @var $model \common\models\Subject */

?>
<a class="subject-list__item" style="background: linear-gradient(90deg, rgba(0,0,0,0.4) 10%, rgba(0,0,0,0.4) 40%), url('<?= '/img/' . $model->img ?>')" href="<?= \yii\helpers\Url::to(['olympiad/assignment', 'subject' => $model->id]) ?>">
    <h4><?= $model->name ?></h4>
</a>
