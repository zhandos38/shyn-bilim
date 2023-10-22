<?php

use yii\helpers\Url;

?>
<nav class="mainmenu-nav">
    <ul class="mainmenu">
        <li class="position-static">
            <a href="/"><?= Yii::t('app', 'Главная') ?></a>
        </li>
        <li class="position-static">
            <a href="<?= Url::to(['news/index']) ?>"><?= Yii::t('app', 'Блог') ?></a>
        </li>
        <li class="position-static">
            <a href="<?= Url::to(['magazine/index']) ?>"><?= Yii::t('app', 'Журнал') ?></a>
        </li>
        <li class="position-static">
            <a href="<?= Url::to(['book/index']) ?>" disabled=""><?= Yii::t('app', 'Балалар кітапханасы') ?></a>
        </li>
        <li class="position-static">
            <a href="<?= Url::to(['olympiad/index']) ?>"><?= Yii::t('app', 'Олимпиады') ?></a>
        </li>
        <li class="position-static">
            <a href="<?= Url::to(['article/index']) ?>"><?= Yii::t('app', 'Материалдар базасы') ?></a>
        </li>
        <li class="position-static">
            <a href="<?= Url::to(['site/contact']) ?>"><?= Yii::t('app', 'Контакты') ?></a>
        </li>
    </ul>
</nav>