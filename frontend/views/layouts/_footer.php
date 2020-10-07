<?php
use yii\helpers\Url;

?>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <ul class="footer-list">
                    <li class="footer-list__item footer-list__item--main">
                        <a class="footer__link" href="#"><?= Yii::t('app', 'Информация') ?></a>
                    </li>
                    <li class="footer-list__item">
                        <a href="<?= Yii::$app->params['staticDomain'] . '/offer.pdf' ?>"><?= Yii::t('app', 'Публичная оферта') ?></a>
                    </li>
                    <li class="footer-list__item">
                        <a href="#"><?= Yii::t('app', 'Вопросы и ответы') ?></a>
                    </li>
                </ul>
                <ul class="footer-list">
                    <li class="footer-list__item footer-list__item--main">
                        <a class="footer__link" href="#"><?= Yii::t('app', 'Ссылки') ?></a>
                    </li>
                    <li class="footer-list__item">
                        <a href="/"><?= Yii::t('app', 'Главная') ?></a>
                    </li>
                    <li class="footer-list__item">
                        <a href="<?= Url::to(['news/index']) ?>"><?= Yii::t('app', 'Новости') ?></a>
                    </li>
                    <li class="footer-list__item">
                        <a href="<?= Url::to(['magazine/index']) ?>"><?= Yii::t('app', 'Журналы') ?></a>
                    </li>
                    <li class="footer-list__item">
                        <a href="<?= Url::to(['olympiad/index']) ?>"><?= Yii::t('app', 'Олимпиады') ?></a>
                    </li>
                    <li class="footer-list__item">
                        <a href="<?= Url::to(['project/index']) ?>"><?= Yii::t('app', 'Проекты') ?></a>
                    </li>
                    <li class="footer-list__item">
                        <a href="<?= Url::to(['site/contact']) ?>"><?= Yii::t('app', 'Контакты') ?></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="footer-list">
                    <li class="footer-list__item footer-list__item--main">
                        <a class="footer__link" href="#"><?= Yii::t('app', 'Редакция') ?></a>
                    </li>
                    <li class="footer-list__item">
                        <a href="tel:87083176516">+7(708) 317 65 16</a>
                    </li>
                    <li class="footer-list__item">
                        <a href="tel:87750767876">+7(775) 076 78 76</a>
                    </li>
                    <li class="footer-list__item">
                        <a href="mailto:bilimshini.kz@mail.ru"><i class="fa fa-envelope"></i> bilimshini.kz@mail.ru</a>
                    </li>
                </ul>
                <ul class="footer-list">
                    <li class="footer-list__item footer-list__item--main">
                        <a class="footer__link" href="#"><?= Yii::t('app', 'Полиграфия') ?></a>
                    </li>
                    <li class="footer-list__item">
                        <a href="tel:87015907916">+7(701) 590 79 16</a>
                    </li>
                    <li class="footer-list__item">
                        <a href="tel:87784180083">+7(778) 418 00 83</a>
                    </li>
                    <li class="footer-list__item">
                        <a href="mailto:polygraphy@bilimshini.kz"><i class="fa fa-envelope"></i> polygraphy@bilimshini.kz</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="footer-list">
                    <li class="footer-list__item footer-list__item--main">
                        <a class="footer__link" href="#"><?= Yii::t('app', 'Учебный центр') ?></a>
                    </li>
                    <li class="footer-list__item">
                        <a href="tel:87754243727">+7(775) 424 37 27</a>
                    </li>
                    <li class="footer-list__item">
                        <a href="tel:87754037284">+7(775) 403 72 84</a>
                    </li>
                    <li class="footer-list__item">
                        <a href="mailto:bilimshini.kz@mail.ru"><i class="fa fa-envelope"></i> bilimshini.kz@mail.ru</a>
                    </li>
                </ul>
                <ul class="footer-list">
                    <li class="footer-list__item footer-list__item--main">
                        <a class="footer__link" href="#"><?= Yii::t('app', 'Фотостудия') ?></a>
                    </li>
                    <li class="footer-list__item">
                        <a href="tel:87083176516">+7(708) 317 65 16</a>
                    </li>
                    <li class="footer-list__item">
                        <a href="tel:87472339745">+7(747) 233 97 35</a>
                    </li>
                    <li class="footer-list__item">
                        <a href="mailto:photo-studio@bilimshini.kz"><i class="fa fa-envelope"></i> photo-studio@bilimshini.kz</a>
                    </li>
                </ul>
            </div>
        </div>
        <div style="text-align: center">
            Designed and Developed with <i class="fa fa-heart text-danger"></i> by <a href="https://vk.com/zhandragon96">Jako</a>
        </div>
    </div>
</footer>