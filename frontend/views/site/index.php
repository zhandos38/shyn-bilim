<?php

use yii\helpers\Url;

$this->title = Yii::t('app', 'Главная страница');
?>
<div class="container">
    <!-- Begin Main -->
    <div class="main-block">
        <div class="main-block__title-wrapper">
            <img class="main-block__logo" src="/img/main-brand.png" alt="logo">
        </div>
        <div class="main-block__image-wrapper">
            <img class="main-block__image" src="/img/main.png" alt="image">
        </div>
    </div>
    <!-- End Main -->
</div>
<div class="about-block" style="padding: 20px 0 60px 0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p style="margin: 60px 0">
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
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="feature-block">
                            <a href="<?= Url::to(['about/printing']) ?>">
                                <div class="feature-block__preview">
                                    <img src="/img/feature-2.png" alt="#" title="#">
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
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="feature-block">
                            <a href="<?= Url::to(['about/photo-studio']) ?>">
                                <div class="feature-block__preview">
                                    <img src="/img/feature-4.png" alt="#" title="#">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
