<?php

use yii\helpers\Url;

/** @var \common\models\Olympiad $olympiad */

$this->title = 'Bilimshini.kz - образовательный портал';
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'Bilimshini, Білімшыңы, Білімшыны'
]);
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Білім шыңы Республикалық ұстаздар мен оқушылар сайты. Ұстаздарға мен оқушыларға онлайн олимпиадалар, сертификаттар, грамоталар, дипломдар, сабақ жоспарлары және басқа да материалдар'
]);
?>
<style>
    .rbt-card {
        padding: 0;
        background: transparent;
    }
</style>
<div class="slider-area rbt-banner-5 height-750 bg_image" style="position: relative" data-gradient-overlay="7">
    <div class="slider-oyu">
        <img src="/img/hero/oyu.png" alt="oyu">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h1 class="title display-one">
                                Педагогтерге, балаларға, <br> ата-аналарға арналған платформа
                            </h1>
                            <div class="description">
                                Ең үздік, ең креативті тұлғалар:
                                <ul class="banner-list">
                                    <li>Бізбен бірге қалыптасады.</li>
                                    <li>Бізбен бірге дамиды.</li>
                                    <li>Бізбен бірге білім шыңын бағындырады.</li>
                                </ul>
                            </div>

                            <?php if ($olympiad): ?>
                            <div>
                                <a class="rbt-btn btn-white hover-icon-reverse text-uppercase" href="<?= Url::to(['olympiad/assignment', 'id' => $olympiad->id]) ?>">
                                    <div class="icon-reverse-wrapper">
                                        <span class="btn-text banner-btn">"АЛТЫН ҰРПАҚ -2024" ОЛИМПИАДАСЫНА ҚАТЫСУ</span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </div>
                                </a>
                                <a class="rbt-btn btn-border hover-icon-reverse color-white mt-4" href="<?= $olympiad->getFile() ?>">
                                    <div class="icon-reverse-wrapper">
                                        <span class="btn-text">ЕРЕЖЕ</span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </div>
                                </a>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6 mt-4 mt-lg-0">
                            <div class="banner-card pb--30 swiper rbt-dot-bottom-center banner-swiper-active swiper-cards swiper-3d swiper-initialized swiper-horizontal swiper-pointer-events">
                                <div class="swiper-wrapper" style="cursor: grab; transition-duration: 0ms;" id="swiper-wrapper-282072954a06d1a10" aria-live="polite">

                                    <!-- Start Single Card  -->
                                    <div class="swiper-slide swiper-slide-visible swiper-slide-active" style="width: 390px; z-index: 3; transform: translate3d(0px, 0px, 0px) rotateZ(0deg) scale(1); transition-duration: 0ms;" role="group" aria-label="1 / 3">
                                        <div class="rbt-card variation-01 rbt-hover">
                                            <div class="rbt-card-img">
                                                <a href="https://bilim-shini.kz/kz/olympiad/assignment?id=18">
                                                    <img src="/img/altyn-urpaq-2024/banner.jpg" style="width: 100%" alt="banner-part1.png">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="swiper-slide-shadow" style="opacity: 0; transition-duration: 0ms;"></div></div>
                                    <!-- End Single Card  -->

                                </div>
                                <div class="rbt-swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1" aria-current="true"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span></div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-color-white rbt-section-gapTop rbt-section-gapBottom">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="<?= Url::to(['book/index']) ?>" class="menu-card">
                    <div>
                        <div>
                            <img class="menu-card__img" src="/img/menu-icon/child-library.png" alt="menu-icon">
                        </div>
                        <div class="menu-card__text-box">
                            <h5 class="mb--0">
                                «ШЫҢ»
                                КІТАПХАНАСЫ
                            </h5>
                            <small class="menu-card__desc">
                                КІТАП ОҚЫП, СЫЙЛЫҚ ҰТЫП АЛ!
                            </small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="<?= Url::to(['article/index']) ?>" class="menu-card">
                    <div>
                        <div>
                            <img class="menu-card__img" src="/img/menu-icon/new-projects.png" alt="menu-icon">
                        </div>
                        <div class="menu-card__text-box">
                            <h5 class="mb--0">
                                БАЙҚАУ
                            </h5>
                            <small class="menu-card__desc">
                                "ТАБЫСТЫ СЫНЫП ЖЕТЕКШІ-2024"
                            </small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="<?= Url::to(['olympiad/index']) ?>" class="menu-card">
                    <div>
                        <div>
                            <img class="menu-card__img" src="/img/menu-icon/olympiads.png" alt="menu-icon">
                        </div>
                        <div class="menu-card__text-box">
                            <h5 class="mb--0">
                                ОЛИМПИАДАЛАР
                            </h5>
                            <small class="menu-card__desc">
                                Қатыс! Жетістік жина!
                            </small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="<?= Url::to(['article/index']) ?>" class="menu-card">
                    <div>
                        <div>
                            <img class="menu-card__img" src="/img/menu-icon/article-base.png" alt="menu-icon">
                        </div>
                        <div class="menu-card__text-box">
                            <h5 class="mb--0">
                                МАТЕРИАЛДАР БАЗАСЫ
                            </h5>
                            <small class="menu-card__desc">
                                ІС-ТӘЖРИБЕ ТАРАТЫП, ПОРТФОЛИОДА ЖОҒАРЫ ҰПАЙ ЖИНАҢЫЗ!
                            </small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="<?= Url::to(['news/index']) ?>" class="menu-card">
                    <div>
                        <div>
                            <img class="menu-card__img" src="/img/menu-icon/blog.png" alt="menu-icon">
                        </div>
                        <div class="menu-card__text-box">
                            <h5 class="mb--0">
                                БЛОГ
                            </h5>
                            <small class="menu-card__desc">
                                ҚЫЗЫҚТЫ ЖАҢАЛЫҚТАРДАН ҚҰР ҚАЛМАҢЫЗ!
                            </small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="<?= Url::to(['about/index']) ?>" class="menu-card">
                    <div>
                        <div>
                            <img class="menu-card__img" src="/img/menu-icon/about-use.png" alt="menu-icon">
                        </div>
                        <div class="menu-card__text-box">
                            <h5 class="mb--0">
                                БІЗ ТУРАЛЫ
                            </h5>
                            <small class="menu-card__desc">
                                БІЛІМ ШЫҢЫ БАСПАЛДАҒЫНА БІРГЕ КӨТЕРІЛЕМІЗ!
                            </small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="<?= Url::to(['site/questions']) ?>" class="menu-card">
                    <div>
                        <div>
                            <img class="menu-card__img" src="/img/menu-icon/faq.png" alt="menu-icon">
                        </div>
                        <div class="menu-card__text-box">
                            <h5 class="mb--0">
                                СҰРАҚ-ЖАУАП
                            </h5>
                            <small class="menu-card__desc">
                                Дайын әрі жылдам көмек бөлімі
                            </small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="<?= Url::to(['site/contact']) ?>" class="menu-card">
                    <div>
                        <div>
                            <img class="menu-card__img" src="/img/menu-icon/contacts.png" alt="menu-icon">
                        </div>
                        <div class="menu-card__text-box">
                            <h5 class="mb--0">
                                БАЙЛАНЫС
                            </h5>
                            <small class="menu-card__desc">
                                Жауап беру қызметіміз
                            </small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="rbt-counterup-area bg-color-extra2 rbt-section-gapBottom">
    <div style="background-color: #ffd101; display: flex; justify-content: space-between; padding: 0 60px">
        <div>
            <img style="width: 360px" src="/img/pencil.png" alt="pencil.png">
        </div>
        <div style="display: flex; align-items: center">
            <div style="text-align: center">
                <h2 style="color: #00c9be;">“ШЫҢ” КІТАПХАНАСЫ</h2>
                <div style="color: #00c9be;font-size: 28px;">“БІРТҰТАС ТӘРБИЕ” БАҒДАРЛАМАСЫ</div>
            </div>
        </div>
        <div>
            <img style="width: 360px" src="/img/book.png" alt="book.png">
        </div>
    </div>

    <div class="container">
        <div class="row row--15 mt_dec--80 justify-content-center">
            <!-- Start Single Card  -->
            <div class="col-xl-3 col-md-6 col-sm-6 col-12 mt--30">
                <div class="rbt-flipbox">
                    <div class="rbt-flipbox-wrap rbt-service rbt-service-1 card-bg-2">
                        <div class="rbt-flipbox-front rbt-flipbox-face inner">
                            <div class="icon">
                                <img src="/img/library-item2.png" alt="card-icon">
                            </div>
                            <div class="content">
                                <h5 class="title"><a href="#">6-10 ЖАС</a></h5>
                                <h6 class="title"><a href="#">БАСТАУЫШ СЫНЫП</a></h6>
                                <a class="rbt-btn-link stretched-link" href="#">Толығырақ<i class="feather-arrow-right"></i></a>
                            </div>
                        </div>

                        <div class="rbt-flipbox-back rbt-flipbox-face inner">
                            <p style="font-size: 16px">
                                Қазақ халқының мақал-мәтелдері,
                                тыйым сөздер, Ұлттық ойындар
                                («Асық party» өткізу, Хан талапай, Арқан
                                тартыс, Алтыбақан, Айгөлек,
                                Белдесу, Саққұлақ, Тымпи, Тоғызқұмалақ т.б.)
                                физикалық, зияткерлік тұрғыдан дамиды
                            </p>
                            <a class="rbt-btn rbt-switch-btn btn-white btn-sm" href="<?= Url::to(['book/index']) ?>">
                                <span data-text="Жазылу">Кітапханаға өту</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Card  -->

            <!-- Start Single Card  -->
            <div class="col-xl-3 col-md-6 col-sm-6 col-12 mt--30">
                <div class="rbt-flipbox">
                    <div class="rbt-flipbox-wrap rbt-service rbt-service-1 card-bg-3">
                        <div class="rbt-flipbox-front rbt-flipbox-face inner">
                            <div class="icon">
                                <img src="/img/library-item3.png" alt="card-icon">
                            </div>
                            <div class="content">
                                <h5 class="title"><a href="#">11-15 ЖАС</a></h5>
                                <h6 class="title"><a href="#">ОРТА БУЫН</a></h6>
                                <a class="rbt-btn-link stretched-link" href="#">Толығырақ<i class="feather-arrow-right"></i></a>
                            </div>
                        </div>

                        <div class="rbt-flipbox-back rbt-flipbox-face inner">
                            <p style="font-size: 16px">
                                Батырлар, ақын-жыраулар және
                                ұлт зиялыларының, тарихи тұлғалар мен
                                қоғам қайраткерлерінің өмірлік жолдарын,
                                қалдырған мұралармен танысады.
                                Көркем әдебиеттер оқиды
                            </p>
                            <a class="rbt-btn rbt-switch-btn btn-white btn-sm" href="<?= Url::to(['book/index']) ?>">
                                <span data-text="Жазылу">Кітапханаға өту</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Card  -->

            <!-- Start Single Card  -->
            <div class="col-xl-3 col-md-6 col-sm-6 col-12 mt--30">
                <div class="rbt-flipbox">
                    <div class="rbt-flipbox-wrap rbt-service rbt-service-1 card-bg-4">
                        <div class="rbt-flipbox-front rbt-flipbox-face inner">
                            <div class="icon">
                                <img src="/img/library-item4.png" alt="card-icon">
                            </div>
                            <div class="content">
                                <h5 class="title"><a href="#">15-18 ЖАС</a></h5>
                                <h6 class="title"><a href="#">ЖОҒАРЫ СЫНЫП</a></h6>
                                <a class="rbt-btn-link stretched-link" href="#">Толығырақ<i class="feather-arrow-right"></i></a>
                            </div>
                        </div>

                        <div class="rbt-flipbox-back rbt-flipbox-face inner">
                            <p style="font-size: 16px">
                                Табиғи мұра, мәдени мұра, ұлт тарихы,
                                Қазақстан елін қорғаған батырлар,
                                билер, шешендер, даналар, көсемдер,
                                абыздар, ағартушылар мен ұлт зиялыларымен
                                танысады. Көркем әдебиеттер оқиды
                            </p>
                            <a class="rbt-btn rbt-switch-btn btn-white btn-sm" href="<?= Url::to(['book/index']) ?>">
                                <span data-text="Жазылу">Кітапханаға өту</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Card  -->

            <!-- Start Single Card  -->
            <div class="col-xl-3 col-md-6 col-sm-6 col-12 mt--30">
                <div class="rbt-flipbox">
                    <div class="rbt-flipbox-wrap rbt-service rbt-service-1 card-bg-1">
                        <div class="rbt-flipbox-front rbt-flipbox-face inner">
                            <div class="icon">
                                <img src="/img/library-item4.png" alt="card-icon">
                            </div>
                            <div class="content">
                                <h5 class="title"><a href="#">Оқуға құштар мұғалім</a></h5>
                                <h6 class="title"><a href="#">Мұғалімдер</a></h6>
                                <a class="rbt-btn-link stretched-link" href="#">Толығырақ<i class="feather-arrow-right"></i></a>
                            </div>
                        </div>

                        <div class="rbt-flipbox-back rbt-flipbox-face inner">
                            <p style="font-size: 16px">
                                -
                            </p>
                            <a class="rbt-btn rbt-switch-btn btn-white btn-sm" href="<?= Url::to(['book/index']) ?>">
                                <span data-text="Жазылу">Кітапханаға өту</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Card  -->
        </div>
    </div>
</div>

<style>
.balls-hero__item-img {
    position: relative;
    display: flex;
    justify-content: center;
}
.balls-hero__item-title {
    color: #fff;
    text-transform: uppercase;
    margin-top: 20px;
}
.balls-hero__item1 {
    width: 120px;
}
.balls-hero__item2 {
    width: 120px;
    position: absolute;
}

.banner-list {
    list-style-type: disc !important;
}
.banner-list li {
    color: white;
}
.banner-list li::marker {
    content: unset;
}

.slider-oyu {
    position: absolute !important;
    bottom: 36px;
    left: 5px;
    width: 160px;
    height: 160px;
    z-index: 3 !important;
    opacity: 1;
}
@media only screen and (max-width: 768px) {
    .banner-btn {
        font-size: 11px;
    }

    .slider-oyu {
        width: 80px;
        height: 80px;
    }
}
</style>
