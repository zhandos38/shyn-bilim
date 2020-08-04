<?php

/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Контакты');

$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['site/contact']];
?>
<h2>
    <?= Yii::t('app', 'Контакты'); ?>
</h2>
<div class="row">
    <div class="col-md-4">
        <h4><?= Yii::t('app', 'Реквизиты компании'); ?></h4>
        <ul style="padding: 0">
            <li>ИП «ШЫҢ Баспаханасы»</li>
            <li>ИИН 761022401074</li>
            <li>РК г.Шымкент мкр.Восток, дом 19, кв 97</li>
            <li>Расчетный счет поставщика:</li>
            <li>KZ446010291000219821 KZT</li>
            <li>ЮКОФ АО «Народный Банк Казахстана»</li>
            <li>БИК Банка: HSBKKZKX</li>
        </ul>
    </div>
    <div class="col-md-3">
        <h4><?= Yii::t('app', 'Контактные телефоны'); ?></h4>
        <ul class="phone-list" style="padding: 0">
            <li class="contact-list__item contact-list__item--main">
                <a class="footer__link" href="#"><?= Yii::t('app', 'Редакция') ?></a>
            </li>
            <li class="contact-list__item">
                <a href="tel:87013129906"><i class="fa fa-phone"></i> +7(701) 312 99 06</a>
            </li>
            <li class="contact-list__item">
                <a href="tel:87010767876"><i class="fa fa-phone"></i> +7(701) 076 78 76</a>
            </li>
            <li class="contact-list__item contact-list__item--main">
                <a class="footer__link" href="#"><?= Yii::t('app', 'Полиграфия') ?></a>
            </li>
            <li class="contact-list__item">
                <a href="tel:87015907916"><i class="fa fa-phone"></i> +7(701) 590 79 16</a>
            </li>
            <li class="contact-list__item">
                <a href="tel:87784180083"><i class="fa fa-phone"></i> +7(778) 418 00 83</a>
            </li>
            <li class="contact-list__item contact-list__item--main">
                <a class="footer__link" href="#"><?= Yii::t('app', 'Учебный центр') ?></a>
            </li>
            <li class="contact-list__item">
                <a href="tel:87754243727"><i class="fa fa-phone"></i> +7(775) 424 37 27</a>
            </li>
            <li class="contact-list__item">
                <a href="tel:87754037284"><i class="fa fa-phone"></i> +7(775) 403 72 84</a>
            </li>
            <li class="contact-list__item contact-list__item--main">
                <a class="footer__link" href="#"><?= Yii::t('app', 'Фотостудия') ?></a>
            </li>
            <li class="contact-list__item">
                <a href="tel:87083176516"><i class="fa fa-phone"></i> +7(708) 317 65 16</a>
            </li>
            <li class="contact-list__item">
                <a href="tel:87472339745"><i class="fa fa-phone"></i> +7(747) 233 97 45</a>
            </li>
        </ul>
    </div>
    <div class="col-md-5">
        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Aa30d184806800b22ceb3f7003b68be9420d9e4658902d0facc1dd1a3007d013b&amp;source=constructor" height="400" width="100%" frameborder="0"></iframe>
    </div>
</div>