<?php

/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Контакты');

$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['site/contact']];
$this->params['heroTitle'] = $this->title;
$this->params['heroDescription'] = 'БІЛІМ ШЫҢЫ - ҒЫЛЫМ СЫРЫ';
?>
<div class="row">
    <div class="col-md-6">
        <p>
            <?php if (Yii::$app->language === 'kz'): ?>
                Жұмыс уақыты: дүйсенбі-жұма, 9.00-19.00 <br>
                Сенбі, 10:00-14:00 <br>
                Қазақстан Республикасы, <br>
                Шымкент қаласы, Ғ.Орманов көшесі, 10/1
            <?php else: ?>
                Грфик работы: понедельник-пятница, 9.00-19.00 <br>
                Суббота, 10.00-14.00 <br>
                Республика Казахстана, <br>
                Город Шымкент, ул. Г.Орманова, 10/1
            <?php endif; ?>
        </p>
        <h4><?= Yii::t('app', 'Контактные телефоны'); ?></h4>
        <h6>
            <?= Yii::t('app', 'Редакция') ?>
        </h6>
        <ul class="phone-list" style="padding: 0">
            <li class="contact-list__item">
                <a href="tel:87013129906"><i class="fa fa-phone"></i> +7(701) 312 99 06 ( WhatsApp )</a>
            </li>
            <li class="contact-list__item">
                <a href="mailto:bilimshini.kz@mail.ru"><i class="fa fa-envelope"></i> bilimshini.kz@mail.ru</a>
            </li>
        </ul>
        <h6 class="mt-4">
            <?= Yii::t('app', 'Полиграфия') ?>
        </h6>
        <ul class="phone-list" style="padding: 0">
            <li class="contact-list__item">
                <a href="tel:87013129906"><i class="fa fa-phone"></i> +7(701) 312 99 06 ( WhatsApp )</a>
            </li>
            <li class="contact-list__item">
                <a href="mailto:polygraphy@bilimshini.kz"><i class="fa fa-envelope"></i> polygraphy@bilimshini.kz</a>
            </li>
        </ul>
    </div>
    <div class="col-md-6">
        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Aa30d184806800b22ceb3f7003b68be9420d9e4658902d0facc1dd1a3007d013b&amp;source=constructor" height="600" width="100%" frameborder="0"></iframe>
    </div>
</div>
