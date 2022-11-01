<?php
use yii\helpers\Url;

?>
<!-- start footer -->
<footer class="footer-startup footer-light background-position-right background-no-repeat" style="background-image: url('images/home-startup-footer-down-bg.jpg');">
    <div class="footer-separate">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 h-65px lg-h-30px background-position-center-top background-no-repeat" style="background-image: url('images/home-startup-footer-shadow.png');">
                </div>
            </div>
        </div>
    </div>
    <div class="footer-top padding-four-tb lg-padding-seven-tb md-padding-50px-bottom md-padding-30px-top">
        <div class="container">
            <div class="row">
                <!-- start footer column -->
                <div class="col-12 col-md-3 col-sm-6 sm-margin-40px-bottom xs-margin-25px-bottom">
                    <span class="alt-font font-weight-500 d-block text-extra-dark-gray text-medium margin-20px-bottom xs-margin-10px-bottom"><?= Yii::t('app', 'Информация') ?></span>
                    <ul>
                        <li><a href="<?= Yii::$app->params['staticDomain'] . '/offer.pdf' ?>"><?= Yii::t('app', 'Публичная оферта') ?></a></li>
                        <li><a href="<?= Url::to(['site/questions']) ?>"><?= Yii::t('app', 'Вопросы и ответы') ?></a></li>
                    </ul>
                </div>
                <!-- end footer column -->
                <!-- start footer column -->
                <div class="col-12 col-md-3 col-sm-6 sm-margin-40px-bottom xs-margin-25px-bottom">
                    <span class="alt-font font-weight-500 d-block text-extra-dark-gray text-medium margin-20px-bottom xs-margin-10px-bottom"><?= Yii::t('app', 'Ссылки') ?></span>
                    <ul>
                        <li><a href="<?= Url::to(['article/index']) ?>"><?= Yii::t('app', 'Журнал') ?></a></li>
                        <li><a href="#"><?= Yii::t('app', 'Марафон') ?></a></li>
                        <li><a href="<?= Url::to(['olympiad/index']) ?>"><?= Yii::t('app', 'Олимпиада') ?></a></li>
                        <li><a href="<?= Url::to(['site/contact']) ?>"><?= Yii::t('app', 'Контакты') ?></a></li>
                    </ul>
                </div>
                <!-- end footer column -->
                <!-- start footer column -->
                <div class="col-12 col-md-3 col-sm-6 xs-margin-25px-bottom">
                    <span class="alt-font font-weight-500 d-block text-extra-dark-gray text-medium margin-20px-bottom xs-margin-10px-bottom"><?= Yii::t('app', 'Редакция') ?></span>
                    <ul>
                        <li><a href="tel:+7(775)4037284"><i class="fa fa-phone"></i> +7(775) 403 72 84</a></li>
                        <li><a href="tel:+7(701)3129906"><i class="fa fa-phone"></i> +7(701) 312 99 06</a></li>
                        <li><a href="mailto:bilimshini.kz@mail.ru"><i class="fa fa-envelope"></i> bilimshini.kz@mail.ru</a></li>
                    </ul>
                </div>
                <!-- end footer column -->
                <!-- start footer column -->
                <div class="col-12 col-md-3 col-sm-6">
                    <span class="alt-font font-weight-500 d-block text-extra-dark-gray text-medium margin-20px-bottom xs-margin-10px-bottom"><?= Yii::t('app', 'Полиграфия') ?></span>
                    <ul>
                        <li><a href="tel:+7(775)4037284"><i class="fa fa-phone"></i> +7(775) 403 72 84 ( WhatsApp )</a></li>
                        <li><a href="tel:+7(701)3129906"><i class="fa fa-phone"></i> +7(701) 312 99 06 ( WhatsApp )</a></li>
                        <li><a href="mailto:polygraphy@bilimshini.kz"><i class="fa fa-envelope"></i> polygraphy@bilimshini.kz</a></li>
                    </ul>
                </div>
                <!-- end footer column -->
            </div>
        </div>
    </div>
    <div class="footer-bottom padding-one-top padding-six-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-sm-4 text-center text-sm-start xs-margin-20px-bottom">
                    <a href="/" class="footer-logo"><img src="/img/logo_alt_black.png" data-at2x="/img/logo_alt_black.png" alt=""></a>
                </div>
                <div class="col-12 col-sm-8 text-center text-sm-end last-paragraph-no-margin">
                    <p>&copy; Designed and Developed with  by <a href="https://vk.com/zhandragon96" target="_blank" class="text-decoration-line-bottom text-extra-dark-gray font-weight-500">Jako</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- start scroll to top -->
<a class="scroll-top-arrow" href="javascript:void(0);"><i class="feather icon-feather-arrow-up"></i></a>
<!-- end scroll to top -->
