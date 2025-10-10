<?php
use yii\helpers\Url;

?>
<footer class="rbt-footer footer-style-1">
    <div class="footer-top">
        <div class="container">
            <div class="row row--15 mt_dec--30">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--30">
                    <div class="footer-widget">
                        <div class="logo">
                            <img src="/img/bilimshini-logo_reverse.png" alt="Bilimshini" style="width: 20px">
                            Bilim-shini.kz
                        </div>

                        <p class="description mt--20">
                            Біз әрдайым талантты адамдарды іздеудеміз.
                        </p>

                        <div class="contact-btn mt--30">
                            <a class="rbt-btn hover-icon-reverse btn-border-gradient radius-round" href="#">
                                <div class="icon-reverse-wrapper">
                                    <span class="btn-text">Бізбен байланыста болыңыз</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="offset-lg-4 col-lg-2 col-md-6 col-sm-6 col-12 mt--30">
                    <div class="footer-widget">
                        <h5 class="ft-title">Ақпарат</h5>
                        <ul class="ft-link">
                            <li><a href="<?= Url::to(['site/offer']) ?>"><?= Yii::t('app', 'Публичная оферта') ?></a></li>
                            <li><a href="<?= Url::to(['site/policy']) ?>">Политика конфиденциальности</a></li>
                            <li><a href="<?= Url::to(['site/questions']) ?>"><?= Yii::t('app', 'Вопросы и ответы') ?></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6 col-12 mt--30">
                    <div class="footer-widget">
                        <h5 class="ft-title">Байланыс</h5>
                        <ul class="ft-link">
                            <li><a href="tel:+7(775)4243727"><i class="fa fa-phone"></i> +7(701) 312 99 06</a></li>
                            <li><a href="mailto:bilimshini.kz@gmail.com"><i class="fa fa-envelope"></i> bilimshini.kz@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
