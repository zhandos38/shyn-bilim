<?php
use yii\helpers\Url;

$this->title = Yii::t('app', 'Книги');
$this->params['heroTitle'] = $this->title;
$this->params['heroDescription'] = 'КАНИКУЛДА КІТАП ОҚИМЫЗ';

/** @var integer $grade */
/** @var integer $marathonId */
?>
<div class="rbt-page-banner-wrapper">
    <!-- Start Banner BG Image  -->
    <div class="rbt-banner-image"></div>
    <!-- End Banner BG Image  -->
    <div class="rbt-banner-content">
        <!-- Start Banner Content Top  -->
        <div class="rbt-banner-content-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Start Breadcrumb Area  -->
                        <ul class="page-list">
                            <li class="rbt-breadcrumb-item"><a href="#">Басты бет</a></li>
                            <li>
                                <div class="icon-right"><i class="feather-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">Марафон "Каникулда кітап оқу"</li>
                        </ul>
                        <!-- End Breadcrumb Area  -->

                        <div class=" title-wrapper">
                            <h1 class="title mb--0">Марафон "Каникулда кітап оқу"</h1>
                            <a href="#" class="rbt-badge-2">
                                <div class="image">🎉</div>
                                Всего <?= $grade <= 6 ? '2' : '1' ?> книг
                            </a>
                        </div>
                        <a class="rbt-badge-4" href="<?= Url::to(['marathon/get-cert', 'id' => $marathonId]) ?>"><i class="fa fa-download"></i> Сертификат жүктеу</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner Content Top  -->
    </div>
</div>

<div class="rbt-counterup-area rbt-section-overlayping-top rbt-section-gapBottom">
    <div class="container">
        <div class="row row--30 gy-5">
            <?php if ($grade <= 4 && $grade >= 2 ): ?>
                <div class="col-md-4">
                    <div class="rbt-card variation-01 rbt-hover">
                        <div class="rbt-card-body">
                            <div class="rbt-card-img">
                                <a href="#">
                                    <img src="/img/kanikulda-kitap-oku-2024/2-4/ybyrai.jpg" alt="Card image">
                                </a>
                            </div>

                            <h4 class="rbt-card-title">
                                <a href="#">ЫБЫРАЙ АЛТЫНСАРИННІҢ ӨЛЕҢДЕРІ МЕН ӘҢГІМЕЛЕРІ</a>
                            </h4>

                            <div class="rbt-card-bottom">
                                <a class="rbt-btn-link" href="/file/kanikulda-kitap-oku-2024/2-4/Ыбырай Алтынсариннің ғибратты шығармашылығы.pdf" download="Ыбырай Алтынсариннің ғибратты шығармашылығы.pdf">
                                    Жүктеу
                                    <i class="fa fa-download"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="rbt-card variation-01 rbt-hover">
                        <div class="rbt-card-body">
                            <div class="rbt-card-img">
                                <a href="#">
                                    <img src="/img/kanikulda-kitap-oku-2024/2-4/ak_kobelek.png" alt="Card image">
                                </a>
                            </div>

                            <h4 class="rbt-card-title">
                                <a href="#">Ақ көбелек балаларға арналған ертегілер мен әңгімелер</a>
                            </h4>

                            <div class="rbt-card-bottom">
                                <a class="rbt-btn-link" href="/file/kanikulda-kitap-oku-2024/2-4/Ақ көбелек балаларға арналған ертегілер мен әңгімелер.pdf" download="Ақ көбелек балаларға арналған ертегілер мен әңгімелер.pdf">
                                    Жүктеу
                                    <i class="fa fa-download"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif ($grade <= 6 && $grade >= 5): ?>
                <div class="col-md-4">
                    <div class="rbt-card variation-01 rbt-hover">
                        <div class="rbt-card-body">
                            <div class="rbt-card-img">
                                <a href="#">
                                    <img src="/img/kanikulda-kitap-oku-2024/5-6/jusan-isi.png" alt="Card image">
                                </a>
                            </div>

                            <h4 class="rbt-card-title">
                                <a href="#">
                                    ЖУСАН ИСІ
                                </a>
                            </h4>

                            <div class="rbt-card-bottom">
                                <a class="rbt-btn-link" href="/file/kanikulda-kitap-oku-2024/5-6/САЙЫН МҰРАТБЕКОВ. ЖУСАН ИСІ.pdf" download="САЙЫН МҰРАТБЕКОВ. ЖУСАН ИСІ.pdf">
                                    Жүктеу
                                    <i class="fa fa-download"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="rbt-card variation-01 rbt-hover">
                        <div class="rbt-card-body">
                            <div class="rbt-card-img">
                                <a href="#">
                                    <img src="/img/kanikulda-kitap-oku-2024/5-6/ybyrai.jpg" alt="Card image">
                                </a>
                            </div>

                            <h4 class="rbt-card-title">
                                <a href="#">
                                    ЫБЫРАЙ АЛТЫНСАРИННІҢ ӨЛЕҢДЕРІ МЕН ӘҢГІМЕЛЕРІ
                                </a>
                            </h4>

                            <div class="rbt-card-bottom">
                                <a class="rbt-btn-link" href="/file/kanikulda-kitap-oku-2024/5-6/ЫБЫРАЙ АЛТЫНСАРИН ӨЛЕҢДЕРІ МЕН ӘҢГІМЕЛЕРІ.pdf" download="ЫБЫРАЙ АЛТЫНСАРИН ӨЛЕҢДЕРІ МЕН ӘҢГІМЕЛЕРІ.pdf">
                                    Жүктеу
                                    <i class="fa fa-download"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif ($grade <= 9 && $grade >= 7): ?>
                <div class="col-md-4">
                    <div class="rbt-card variation-01 rbt-hover">
                        <div class="rbt-card-body">
                            <div class="rbt-card-img">
                                <a href="#">
                                    <img src="/img/kanikulda-kitap-oku-2024/7-9/alpamis-batyr.png" alt="Card image">
                                </a>
                            </div>

                            <h4 class="rbt-card-title">
                                <a href="#">
                                    Алпамыс Батыр
                                </a>
                            </h4>

                            <div class="rbt-card-bottom">
                                <a class="rbt-btn-link" href="/file/kanikulda-kitap-oku-2024/7-9/Ақселеу Сейдімбеков. Алпамыс Батыр.pdf" download="Ақселеу Сейдімбеков. Алпамыс Батыр.pdf">
                                    Жүктеу
                                    <i class="fa fa-download"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif ($grade <= 11 && $grade >= 10): ?>
                <div class="col-md-4">
                    <div class="rbt-card variation-01 rbt-hover">
                        <div class="rbt-card-body">
                            <div class="rbt-card-img">
                                <a href="#">
                                    <img src="/img/kanikulda-kitap-oku-2024/10-11/jabai_alma.png" alt="Card image">
                                </a>
                            </div>

                            <h4 class="rbt-card-title">
                                <a href="#">
                                    Алпамыс Батыр
                                </a>
                            </h4>

                            <div class="rbt-card-bottom">
                                <a class="rbt-btn-link" href="/file/kanikulda-kitap-oku-2024/10-11/Жабайы алма. Сайын Мұратбеков.pdf" download="Жабайы алма. Сайын Мұратбеков.pdf">
                                    Жүктеу
                                    <i class="fa fa-download"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
