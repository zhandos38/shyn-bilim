<?php
use yii\helpers\Url;

?>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="footer-list">
                    <li class="footer-list__item">
                        <a class="footer__link" href="#"><?= Yii::t('app', 'О нас') ?></a>
                    </li>
                    <li class="footer-list__item">
                        <a class="footer__sub-link" href="#"><?= Yii::t('app', 'Редакция') ?></a>
                    </li>
                    <li class="footer-list__item">
                        <a class="footer__sub-link" href="#"><?= Yii::t('app', 'Полиграфия') ?></a>
                    </li>
                    <li class="footer-list__item">
                        <a class="footer__sub-link" href="#"><?= Yii::t('app', 'Фотостудия') ?></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="footer-list">
                    <li class="footer-list__item">
                        <a class="footer__link" href="#"><?= Yii::t('app', 'Журнал') ?></a>
                    </li>
                    <li class="footer-list__item">
                        <a class="footer__link" href="#"><?= Yii::t('app', 'Турниры') ?></a>
                    </li>
                    <li class="footer-list__item">
                        <a class="footer__link" href="#"><?= Yii::t('app', 'Конкурсы') ?></a>
                    </li>
                    <li class="footer-list__item">
                        <a class="footer__link" href="#"><?= Yii::t('app', 'Олимпиады') ?></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="footer-list">
                    <li class="footer-list__item">
                        <a class="footer__link" href="#"><?= Yii::t('app', 'Вебинары') ?></a>
                    </li>
                    <li class="footer-list__item">
                        <a class="footer__link" href="#"><?= Yii::t('app', 'Конференции') ?></a>
                    </li>
                    <li class="footer-list__item">
                        <a class="footer__link" href="#"><?= Yii::t('app', 'Материал жариялау') ?></a>
                    </li>
                    <li class="footer-list__item">
                        <a class="footer__link" href="#"><?= Yii::t('app', 'Жобалар') ?></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <img class="footer__img" src="/img/logo.png" alt="logo">
            </div>
        </div>
    </div>
</footer>