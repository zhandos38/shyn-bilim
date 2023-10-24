<?php

use yii\helpers\Url;

?>
<div class="rbt-my-account-tab-button nav" role="tablist">
    <a href="<?= Url::to(['cabinet/index']) ?>" class="active" data-bs-toggle="tab">Профиль</a>
    <a href="#">Олимпиадалар</a>
    <a href="<?= Url::to(['site/logout']) ?>">Шығу</a>
</div>