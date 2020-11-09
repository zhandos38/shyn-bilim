<?php
/* @var $model \common\models\Test */

use yii\helpers\Url; ?>
<a class="olympiad-item" href="<?= Url::to(['olympiad/assignment', 'id' => $model->id]) ?>">
    <span><?= $model->name ?></span>
</a>
