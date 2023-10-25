<?php
use common\models\Subject;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $subjects Subject */
/* @var $subject Subject */

$this->title = Yii::t('app', 'Материалы');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['article/index']];
$this->params['heroTitle'] = $this->title;
$this->params['heroDescription'] = 'БІЛІМ ШЫҢЫ - ҒЫЛЫМ СЫРЫ';
?>
<div class="rbt-breadcrumb-default rbt-breadcrumb-style-3">
    <div class="breadcrumb-inner">
        <img src="/images/bg/bg-image-10.jpg" alt="Education Images">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="content text-start">
                    <ul class="page-list">
                        <li class="rbt-breadcrumb-item"><a href="index.html">Басты бет</a></li>
                        <li>
                            <div class="icon-right"><i class="feather-chevron-right"></i></div>
                        </li>
                        <li class="rbt-breadcrumb-item active">Материалдар базасы</li>
                    </ul>
                    <h2 class="title">МАТЕРИАЛДАР БАЗАСЫ</h2>
                    <p class="description">
                        МАТЕРИАЛ ЖАРИЯЛАП,
                        ПОРТФОЛИОҒА ЖАРАМДЫ
                        МАРАПАТТАРДЫ ИЕЛЕНІҢІЗ!
                    </p>

                    <div class="d-flex align-items-center mb--20 flex-wrap rbt-course-details-feature">

                        <div class="feature-sin best-seller-badge">
                            <span class="rbt-badge-2">
                                <span class="image"><img src="/images/icons/card-icon-1.png" alt="Best Seller Icon"></span> Портфолиоға жарамды
                            </span>
                        </div>

                        <div class="feature-sin total-rating">
                            <a class="rbt-badge-4" href="#">215,475 мақала</a>
                        </div>

                        <div class="feature-sin total-student">
                            <span>616,029 студент</span>
                        </div>

                    </div>

                    <ul class="rbt-meta">
                        <li><i class="feather-globe"></i>Қазақша</li>
                        <li><i class="feather-globe"></i>Орысша</li>
                        <li><i class="feather-award"></i>Тексерілген</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
    <div class="rbt-course-details-area ptb--60">
        <div class="container">
            <div class="row g-5">

                <div class="col-lg-8">
                    <div class="course-details-content">
                        <div class="about-author-list rbt-shadow-box featured-wrapper has-show-more">
                            <div>
                                <div class="section-title text-center mb--60">
                                    <span class="subtitle bg-secondary-opacity">Портфолио</span>
                                    <h2 class="title">Мақалалар, материал жариялау</h2>
                                </div>
                                <?php if (Yii::$app->language === 'kz'): ?>
                                    <div>
                                        <p>
                                            СӘЛЕМЕТСІЗ БЕ, ҚҰРМЕТТІ  ПЕДАГОГ!
                                        </p>
                                        <p>
                                            Сіз «Білім шыңы-Ғылым сыры» журналының электронды сайтында 3 түрлі
                                            шығармашылық еңбектеріңізді  жариялап, портфолиоға 100% жарамды QR кодталған
                                            Сертификат пен Грамотаны небәрі 2 минутта жүктеп алуыңызға болады.
                                        </p>
                                        <p>
                                            Сертификат пен Грамотаны өз портфолиоңызға қоса аласыз және аттестаттау
                                            комиссиясының лайықты бағасын ала аласыз, осылайша біліктілік санатыңызды
                                            арттырасыз.
                                        </p>
                                        <p>
                                            Сондай-ақ, 1 эссе немесе 1 ғылыми  жоба , 1 қмж , 1 сынып сағатын жариялап,
                                            жетістігіңізді арнайы төсбелгіге жеткізіңіз.
                                        </p>
                                        <p>
                                            «Білім шыңы-Ғылым сыры» журналы ҚР Инвестициялар және Даму Министрлігінің
                                            Байланыс, Ақпараттандыру және Ақпарат комитетіне тіркелген.
                                            Тіркеу куәлігі №15454-Ж (01.07.2015)
                                        </p>
                                    </div>
                                    <div class="mt--30">
                                        <div id="toggleBtn" class="rbt-btn btn-gradient w-100">Толығырақ</div>
                                        <div id="toggleText" style="display: none">
                                            <p>
                                                САЙТТА МАТЕРИАЛ ЖАРИЯЛАУ ТӘРТІБІ:
                                            </p>
                                            <p>
                                                1. Міндетті түрде платформаға 2 айға жазылған болуыңыз керек. <br>
                                                МАТЕРИАЛ ЖАРИЯЛАУ батырмасын басыңыз.
                                            </p>
                                            <p>
                                                2. Анкетаны толық әрі қатесіз толтырыңыз.
                                            </p>
                                            <p>
                                                3. Дайындаған материалыңызды жүктеңіз. (Мақала Word мәтіндік құжатында
                                                Times New Roman,  14 шрифте 3 беттен аспауы. Мақала ішіне сурет енгізуге болады)
                                            </p>
                                            <p>
                                                4. Сақтау дегенді басқаннан кейін Сертификат пен Грамота шығады.
                                            </p>
                                            <p>
                                                5. Жүктеп аласыз.
                                            </p>
                                            <p>
                                                6. Жүктеп үлгермесеңіз, қайта жүктеу қажет болса, ЖЕКЕ КАБИНЕТіңізде сақталады.
                                            </p>
                                            <p>
                                                <b>СҰРАҚТАРЫҢЫЗ БОЛСА</b>
                                                <br>Whatsapp номерлер:
                                                <br><a href="https://wa.me/77786252078">https://wa.me/77786252078</a>
                                                <br><a href="https://wa.me/77750767876">https://wa.me/77750767876</a>
                                            </p>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <p>
                                        В разделе "Публикация" - вы можете найти планы уроков, открытые уроки и учебные часы, и другие документы, необходимые учителям.
                                    </p>
                                    <p>
                                        <b>ЗДРАВСТВУЙ, УВАЖАЕМЫЙ ПЕДАГОГ!</b><br>
                                    <p>
                                        Вы можете получить Сертификат со 100% действительным для портфолио QR-кодом, опубликовав свой материал на сайте электронного журнала «Білім шыңы-Ғылым сыры»
                                    </p>
                                    <p>
                                        Ваш материал будет включен в базу данных ПУБЛИКАЦИИ МАТЕРИАЛОВ нашего сайта, что создаст площадку для практики учителей
                                    </p>
                                    <a id="toggleBtn" style="color: blue" href="#">Подробнее </a>
                                    </p>
                                    <div id="toggleText" style="display: none">
                                        <p><b>УСЛОВИЯ ПУБЛИКАЦИИ МАТЕРИАЛОВ:</b></p>
                                        <p>
                                            1. Нажмите на кнопку ПУБЛИКАЦИЯ МАТЕРИАЛА.
                                        </p>
                                        <p>
                                            2. Заполните анкету полностью и без ошибок.
                                        </p>
                                        <p>
                                            3. Перейдите на страницу оплаты. (Взнос публикации материала – 3000 тг.)
                                        </p>
                                        <p>
                                            4. Находясь на сайте, Вы можете произвести ОПЛАТУ любой платежной картой.
                                        </p>
                                        <p>
                                            5. Сразу после оплаты Вы разместите свой материал на сайте. Выйдет сертификат. Скачайте. Вы можете опубликовать Ваш материал 3 раза по трем темам и получить СЕРТИФИКАТ и ГРАМОТО.
                                        </p>
                                        <p>
                                            6. Если на сайте сложно произвести оплату, Вы можете произвести перевод на номер КАСПИЙ ГОЛД 8775 076 78 76 БАХЫТКҮЛ Е. и отправить чек об оплате и ИИН на wadsap номер. Вам предоставят доступ к публикации материалов.
                                        </p>
                                        <p>
                                            По дополнительным вопросам на Whatsapp:
                                            <br>
                                            <br><a href="https://wa.me/77786252078">https://wa.me/77786252078</a>
                                            <br>
                                            <br><a href="https://wa.me/77083176516">https://wa.me/77083176516</a>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="course-sidebar sticky-top rbt-shadow-box course-sidebar-top rbt-gradient-border">
                        <div class="inner">

                            <img style="width: 400px" src="/img/article-banner1.png" alt="article-banner">

                            <div style="text-align: center">
                                <h5>
                                    МАТЕРИАЛ ЖАРИЯЛАП, <br>
                                    ПОРТФОЛИОҒА ЖАРАМДЫ <br>
                                    МАРАПАТТАРДЫ ИЕЛЕНІҢІЗ!
                                </h5>
                                <a class="article-order-widget__link rbt-btn btn-gradient" href="<?= Url::to(['article/order']) ?>">
                                    <?= Yii::t('app', 'Опубликовать материал') ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container">
    <div class="row">
        <?php foreach ($subjects as $subject): ?>
            <div class="col-md-2">
                <a href="<?= Url::to(['article/list', 'id' => $subject->id]) ?>">
                    <div class="subject-list__item">
                        <div>
                            <div>
                                <img style="height: 120px" src="<?= $subject->getImage() ?>" alt="article-logo.png">
                            </div>
                            <div class="subject-list__title">
                                <h5><?= $subject->getName() ?></h5>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
$js =<<<JS
$('#toggleBtn').click(function() {
  $('#toggleText').toggle('ease');
});
JS;

$this->registerJs($js);
?>