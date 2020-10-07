<?php

/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Контакты');

$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['site/contact']];
?>
<h2>
    <?= Yii::t('app', 'Контакты'); ?>
</h2>
<div class="row">
    <div class="col-md-6">
        <p>
            <?php if (Yii::$app->language === 'kz'): ?>
                Жұмыс уақыты: дүйсенбі-жұма, 9.00-19.00 <br>
                Сенбі, 10:00-14:00 <br>
                Қазақстан Республикасы, <br>
                Шымкент қаласы, Ғ.Орманов көшесі, 6А
            <?php else: ?>
                Грфик работы: понедельник-пятница, 9.00-19.00 <br>
                Суббота, 10.00-14.00 <br>
                Республика Казахстана, <br>
                Город Шымкент, ул. Г.Орманова, 6А
            <?php endif; ?>
        </p>
        <h4><?= Yii::t('app', 'Контактные телефоны'); ?></h4>
        <ul class="phone-list" style="padding: 0">
            <li class="contact-list__item contact-list__item--main">
                <a class="footer__link" href="#"><?= Yii::t('app', 'Редакция') ?></a>
            </li>
            <li class="contact-list__item">
                <a href="tel:87754243727"><i class="fa fa-phone"></i> +7(775) 424 37 27</a>
            </li>
            <li class="contact-list__item">
                <a href="tel:87083176516"><i class="fa fa-phone"></i> +7(708) 317 65 16 ( WhatsApp )</a>
            </li>
            <li class="contact-list__item">
                <a href="tel:87750767876"><i class="fa fa-phone"></i> +7(775) 076 78 76 ( WhatsApp )</a>
            </li>
            <li class="contact-list__item">
                <a href="mailto:bilimshini.kz@mail.ru"><i class="fa fa-envelope"></i> bilimshini.kz@mail.ru</a>
            </li>
            <li class="contact-list__item contact-list__item--main">
                <a class="footer__link" href="#"><?= Yii::t('app', 'Полиграфия') ?></a>
            </li>
            <li class="contact-list__item">
                <a href="tel:87015907916"><i class="fa fa-phone"></i> +7(701) 590 79 16 ( WhatsApp )</a>
            </li>
            <li class="contact-list__item">
                <a href="tel:87784180083"><i class="fa fa-phone"></i> +7(778) 418 00 83 ( WhatsApp )</a>
            </li>
            <li class="contact-list__item">
                <a href="mailto:polygraphy@bilimshini.kz"><i class="fa fa-envelope"></i> polygraphy@bilimshini.kz</a>
            </li>
            <li class="contact-list__item contact-list__item--main">
                <a class="footer__link" href="#"><?= Yii::t('app', 'Учебный центр') ?></a>
            </li>
            <li class="contact-list__item">
                <a href="tel:87754243727"><i class="fa fa-phone"></i> +7(775) 424 37 27 ( WhatsApp )</a>
            </li>
            <li class="contact-list__item">
                <a href="tel:87754037284"><i class="fa fa-phone"></i> +7(775) 403 72 84 ( WhatsApp )</a>
            </li>
            <li class="contact-list__item">
                <a href="mailto:bilimshini.kz@mail.ru"><i class="fa fa-envelope"></i> bilimshini.kz@mail.ru</a>
            </li>
            <li class="contact-list__item contact-list__item--main">
                <a class="footer__link" href="#"><?= Yii::t('app', 'Фотостудия') ?></a>
            </li>
            <li class="contact-list__item">
                <a href="tel:87083176516"><i class="fa fa-phone"></i> +7(708) 317 65 16 ( WhatsApp )</a>
            </li>
            <li class="contact-list__item">
                <a href="tel:87472339745"><i class="fa fa-phone"></i> +7(747) 233 97 35 ( WhatsApp )</a>
            </li>
            <li class="contact-list__item">
                <a href="mailto:photo-studio@bilimshini.kz"><i class="fa fa-envelope"></i> photo-studio@bilimshini.kz</a>
            </li>
        </ul>
    </div>
    <div class="col-md-6">
        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Aa30d184806800b22ceb3f7003b68be9420d9e4658902d0facc1dd1a3007d013b&amp;source=constructor" height="600" width="100%" frameborder="0"></iframe>
    </div>
</div>