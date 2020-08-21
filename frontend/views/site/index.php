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
                        <img class="main-block__logo" src="/img/brand-img.jpg" alt="logo">
                        <div class="main-block__title">
                            <h5>
                                Руспубликалық педагогтар мен оқушыларға арналған ғылыми-әдістемелік, танымдық, мәдени-рухани сайты
                            </h5>
                            <p>
                                Сіз мұнда <b>ашық сабақтар, сабақ жоспарлары, тәрбие сағаттарды</b> тауып және <b>олимпиадаларға</b> да қатыса аласыз
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="main-block__image-wrapper">
                        <img class="main-block__image" src="/img/exam.png" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-news">
        <div class="main-features">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="feature-box">
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
                        <div class="feature-box">
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
                        <div class="feature-box">
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
                        <div class="feature-box">
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
    </div>
</section>
<div class="about-block" style="padding: 120px 0 20px 0; background-color: #fff">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (Yii::$app->language === 'kz'): ?>
                    <p style="margin: 20px 0">
                        <b>«БІЛІМ ШЫҢЫ» сайтының мақсаты</b> - тәрбие мен білім беру үрдісіндегі педагогикалық технологияларды жетік меңгерген, оқушылар қабілеттерін дамытуда жоғарғы нәтиже көрсеткен, белсенді шығармашылықпен жұмыс жасайтын білікті педагогтарға демеу көрсету, озық іс-тәжірибелерін тарату, жалпы мұғалім мәртебесін көтеру және дарынды шәкірттерді дамыту, елге таныту.
                        <br>Сайттан ашық сабақтар, сабақ жоспарларын, қмж, омж, ұмж, ктп, сценарийлер, тәрбие сағаттарды, шәкірттердің шығармашылық жұмыстарын, мұғалімдер мен оқушыларға керекті барлық ақпараттарды таба аласыз.
                        <br>Сайтта материал жариялап, олимпиадаларға, байқаулар мен жобаларға қатысып сертификат, диплом, алғыс хат, грамота мадақтамаларды алып, ЖЕҢІМПАЗ атануға болады.
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
                        <br>На сайте вы найдете открытые уроки, планы занятий, КСП, ССП, ДСП, КТП, сценарии, воспитательные часы, творческие работы учащихся, всю необходимую информацию для учителей и учащихся.
                        <br>Вы можете стать ПОБЕДИТЕЛЕМ, разместив материалы на сайте, участвуя в олимпиадах, конкурсах и проектах, получая сертификаты, дипломы, благодарственные письма, грамоты.
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
        <div class="row">
            <div class="main-news" style="padding: 60px 0 0 0">
                <div class="row">
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
</div>
