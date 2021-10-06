<?php

/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Фотостудия');

$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['about/photo-studio']];
$this->params['heroTitle'] = $this->title;
$this->params['heroDescription'] = 'БІЛІМ ШЫҢЫ - ФОТОСТУДИЯСЫ';
?>
<div class="row">
    <div class="col-md-3">
        <div class="package">
            <ul class="package-list">
                <li class="package-list__item"><h4>Мини пакет</h4></b></li>
                <li class="package-list__item">30 000 тг</li>
                <li class="package-list__item">1-4 адам</li>
                <li class="package-list__item">Студия да жұмыс</li>
                <li class="package-list__item">уақыты 1 сағат</li>
                <li class="package-list__item">1-2 образ</li>
                <li class="package-list__item">2-3 локация</li>
                <li class="package-list__item">30-40 сурет</li>
                <li class="package-list__item">USB флэшкада</li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="/img/photo1.jpeg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/img/photo2.jpeg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/img/photo3.jpeg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/img/photo4.jpeg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/img/photo5.jpeg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/img/photo6.jpeg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/img/photo7.jpeg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="package">
            <ul class="package-list">
                <li class="package-list__item"><h4>Стандарт пакет</h4></li>
                <li class="package-list__item">50 000 тг</li>
                <li class="package-list__item">1-7 адам</li>
                <li class="package-list__item">Студия да жұмыс</li>
                <li class="package-list__item">уақыты 1,5 сағат</li>
                <li class="package-list__item">1-3 образ</li>
                <li class="package-list__item">80-100 сурет</li>
                <li class="package-list__item">USB флэшкада</li>
            </ul>
        </div>
    </div>
</div>
<div style="display: flex; justify-content: space-around; margin: 40px 0">
    <div>
        <a href="tel:87083176516"><i class="fa fa-phone"></i> +7(708) 317 65 16</a>
    </div>
    <div>
        <a href="tel:87472339745"><i class="fa fa-phone"></i> +7(747) 233 97 45</a>
    </div>
    <div>
        <a href="mailto:photo-studio@bilimshini.kz"><i class="fa fa-envelope"></i> photo-studio@bilimshini.kz</a>
    </div>
</div>