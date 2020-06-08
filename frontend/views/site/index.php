<?php

$this->title = 'Главная страница';
?>
<!-- Carousel Card -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="/img/slider1.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h4>
                    <i class="material-icons">location_on</i>
                    Yellowstone National Park, United States
                </h4>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="/img/slider1.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h4>
                    <i class="material-icons">location_on</i>
                    Somewhere Beyond, United States
                </h4>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="/img/slider1.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h4>
                    <i class="material-icons">location_on</i>
                    Yellowstone National Park, United States
                </h4>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <i class="material-icons">keyboard_arrow_left</i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <i class="material-icons">keyboard_arrow_right</i>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- End Carousel Card -->

<div class="container">
    <div class="main-feature">
        <div class="row">
            <div class="col-md-4">
                <div class="feature feature--first">
                    <div class="feature__title">Материалдар</div>
                    <div class="feature__content">Материалы на актуальные темы</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature feature--second">
                    <div class="feature__title">Новости</div>
                    <div class="feature__content">Свежие новости про казахстанское и мировое образование</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature feature--third">
                    <div class="feature__title">Олимпиады</div>
                    <div class="feature__content">Новинки сайта, интервью на различные темы с интересными людьми</div>
                </div>
            </div>
        </div>
    </div>
</div>