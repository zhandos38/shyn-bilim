<?php
use yii\helpers\Url;
?>
<?php if (!Yii::$app->user->identity): ?>
    <a href="<?= Url::to(['site/login']) ?>"><i class="fa fa-user pr-1"></i> <?= Yii::t('app', 'Войти') ?></a>
<?php else: ?>
    <a href="javascript:void(0);">
        <i class="fa fa-user pr-1"></i> <?= Yii::$app->user->identity->name ?>
    </a>
    <ul class="dropdown-menu alt-font">
        <li><a href="<?= Url::to(['article/my-list']) ?>" title="Қазақша"><?= Yii::t('app', 'Мои материалы') ?></a></li>
        <li><a href="<?= Url::to(['site/logout']) ?>" title="Русский"><?= Yii::t('app', 'Выйти') ?></a></li>
    </ul>
<?php endif; ?>
