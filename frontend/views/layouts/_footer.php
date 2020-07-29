<?php
use yii\helpers\Url;

?>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="footer-list">
                    <li class="footer-list__item footer-list__item--main">
                        <a class="footer__link" href="#"><?= Yii::t('app', 'Информация') ?></a>
                    </li>
                    <li class="footer-list__item">
                        <a href="<?= Yii::$app->params['staticDomain'] . '/offer.pdf' ?>"><?= Yii::t('app', 'Публичная оферта') ?></a>
                    </li>
                    <li class="footer-list__item">
                        <a href="<?= Url::to(['site/contact']) ?>"><?= Yii::t('app', 'Контакты') ?></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="footer-list">
                    <li class="footer-list__item footer-list__item--main">
                        <a class="footer__link" href="#"><?= Yii::t('app', 'Контакты') ?></a>
                    </li>
                    <li class="footer-list__item">
                        <a href="<?= Yii::$app->params['staticDomain'] . '/offer.pdf' ?>">+7 (702)</a>
                    </li>
                    <li class="footer-list__item">
                        <a href="<?= Url::to(['site/contact']) ?>">#</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>