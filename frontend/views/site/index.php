<?php

use yii\helpers\Url;

$this->title = Yii::t('app', 'Главная страница');
?>
<section class="main-container">
    <div class="container">
        <div class="main-block">
            <div class="row">
                <div class="col-md-6">
                    <div class="main-block__title-wrapper">
                        <img class="main-block__logo" src="/img/brand-img.jpg" alt="logo" data-aos="fade-right">
                        <div class="main-block__title" data-aos="fade-right" data-aos-delay="300">
                            <?php if (Yii::$app->language === "kz"): ?>
                                <h5>
                                    Педагогтар мен оқушыларға арналған Республикалық ғылыми-әдістемелік, танымдық, мәдени-рухани портал
                                </h5>
                                <p>
                                    Сіз мұнда <b>сабақ жоспарларын, қмж, тәрбие сағаттарды, шәкірттердің шығармашылық жұмыстарын</b> жариялай аласыз.
                                    <br>
                                    Зияткерлік олимпиадаларға, жобаларға қатысып, <b>СЕРТИФИКАТ, ДИПЛОМ, АЛҒЫС ХАТ, ГРАМОТА</b> иеленіп, ЖЕҢІМПАЗ атануға болады.
                                </p>
                            <?php else: ?>
                                <h5>
                                    Республиканский научно-методический, познавательный, культурно-духовный портал для учителей и студентов
                                </h5>
                                <p>
                                    Здесь вы можете опубликовать <b>планы уроков, ксп, учебные часы, творческие работы студентов</b>
                                    <br>
                                    Вы можете принять участие в интеллектуальных олимпиадах, проектах, получить <b>СЕРТИФИКАТ, ДИПЛОМ, БЛАГОДАРНОСТЬ, ГРАМОТУ и стать ПОБЕДИТЕЛЕМ</b>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="main-block__image-wrapper">
                        <img class="main-block__image" data-aos="fade-down" data-aos-easing="ease-in-out" data-aos-duration="1000" src="/img/exam.png" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-features">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="feature-box" data-aos="fade-up">
                        <a href="<?= Url::to(['magazine/index']) ?>">
                            <div class="feature-box__container">
                                <img class="feature-box__image" src="/img/magazine.png" alt="magazine">
                                <div class="feature-box__title">
                                    <span><?= Yii::t('app', 'Журналы') ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-box" data-aos="fade-up" data-aos-delay="300">
                        <a href="<?= Url::to(['article/index']) ?>">
                            <div class="feature-box__container">
                                <img class="feature-box__image" src="/img/application.png" alt="application">
                                <div class="feature-box__title">
                                    <span><?= Yii::t('app', 'Материалы') ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-box" data-aos="fade-up" data-aos-delay="600">
                        <a href="<?= Url::to(['olympiad/index']) ?>">
                            <div class="feature-box__container">
                                <img class="feature-box__image" src="/img/success.png" alt="success">
                                <div class="feature-box__title">
                                    <span><?= Yii::t('app', 'Олимпиады') ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-box" data-aos="fade-up" data-aos-delay="900">
                        <a href="<?= Url::to(['project/index']) ?>">
                            <div class="feature-box__container">
                                <img class="feature-box__image" src="/img/preparation.png" alt="preparation">
                                <div class="feature-box__title">
                                    <span><?= Yii::t('app', 'Жоба') ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-waves">
        <svg width="100%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave"><defs></defs><path id="feel-the-wave" d=""/></svg>

        <svg width="100%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave"><defs></defs><path id="feel-the-wave-two" d=""/></svg>

        <svg width="100%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave"><defs></defs><path id="feel-the-wave-three" d=""/></svg>
    </div>
</section>
<div class="about-block">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (Yii::$app->language === 'kz'): ?>
                    <p style="margin: 20px 0">
                        <b>«БІЛІМ ШЫҢЫ» сайтының мақсаты</b> - тәрбие мен білім беру үрдісіндегі педагогикалық технологияларды жетік меңгерген, оқушылар қабілеттерін дамытуда жоғарғы нәтиже көрсеткен, белсенді шығармашылықпен жұмыс жасайтын білікті педагогтарға демеу көрсету, озық іс-тәжірибелерін тарату, жалпы мұғалім мәртебесін көтеру және дарынды шәкірттерді дамыту, елге таныту.
                    </p>
                    <div style="text-align: center">
                        <h4>ҚҰРМЕТТІ ПЕДАГОГ!</h4>
                        <h4>ТАЛАБЫ ТАУДАЙ ШӘКІРТ!</h4>
                        <p>
                            Сіз бен біз шығармашылық байланыста болып, Мәңгілік ел мерейін өсіру жолында БІЛІМНІҢ БИІК ШЫҢДАРЫН бірге бағындыратын боламыз.
                        </p>
                        <h6>БІЗДІҢ САЙТҚА ҚОШ КЕЛДІҢІЗ!</h6>
                    </div>
                <?php else: ?>
                    <p style="margin: 20px 0">
                        <b> Цель сайта "Білім ШЫҢЫ"</b> - оказание поддержки творчески работающим педагогам, в совершенстве владеющим педагогическими технологиями в воспитательном и образовательном процессе, показавшим высокие результаты в развитии способностей учащихся, распространение передового опыта, повышение престижа учителя в целом и развитие одаренных учащихся, популяризация их творчества.
                    </p>
                    <div style="text-align: center">
                        <h4>УВАЖАЕМЫЙ ПЕДАГОГ!</h4>
                        <h4>УЧЕНИК С ВЫСОКИМИ ТРЕБОВАНИЯМИ!</h4>
                        <p>
                            С Вами мы будем сотрудничать в творческом сотрудничестве и вместе покорять.
                        </p>
                        <p>
                            ВЫСОКИЕ ВЕРШИНЫ ЗНАНИЙ на пути к процветанию
                        </p>
                        <h6>Добро пожаловать на наш сайт!</h6>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="main-news" style="margin: 40px 0 0 0; text-align: center">
            <h4><?= Yii::t('app', 'Дополнительные услуги, предоставляемые вам компанией') ?></h4>
            <div class="row" style="margin-top: 20px">
                <div class="col-md-3">
                    <div class="feature-block">
                        <a href="<?= Url::to(['about/index']) ?>">
                            <div class="feature-block__preview">
                                <img src="/img/feature-1.png" alt="#" title="#">
                            </div>
                            <div class="feature-block__footer">
                                <span><?= Yii::t('app', 'Редакция') ?></span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-block">
                        <a href="<?= Url::to(['about/printing']) ?>">
                            <div class="feature-block__preview">
                                <img src="/img/feature-2.png" alt="#" title="#">
                            </div>
                            <div class="feature-block__footer">
                                <span><?= Yii::t('app', 'Полиграфия') ?></span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-block">
                        <a href="<?= Url::to(['about/education-center']) ?>">
                            <div class="feature-block__preview">
                                <img src="/img/feature-3.png" alt="#" title="#">
                            </div>
                            <div class="feature-block__footer">
                                <span><?= Yii::t('app', 'Учебный центр') ?></span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-block">
                        <a href="<?= Url::to(['about/photo-studio']) ?>">
                            <div class="feature-block__preview">
                                <img src="/img/feature-4.png" alt="#" title="#">
                            </div>
                            <div class="feature-block__footer">
                                <span><?= Yii::t('app', 'Фотостудия') ?></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
