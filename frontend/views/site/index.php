<?php

$this->title = Yii::t('app', 'Главная страница');
?>
<div class="container">
    <!-- Begin Main -->
    <div class="main-block">
        <div class="main-block__title-wrapper">
            <img class="main-block__logo" src="/img/logo.png" alt="logo">
<!--            <span class="main-block__title">БІЛІМ ШЫҢЫ</span>-->
            <img class="main-block__title-img" src="/img/title.png" alt="title">
        </div>
        <div class="main-block__image-wrapper">
            <img class="main-block__image" src="/img/main.png" alt="image">
        </div>
    </div>
    <div class="main-description">
        <div class="row">
            <div class="col-md-12">
                <p style="margin: 60px 0">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae dolorum error explicabo magnam odit pariatur quasi quidem saepe. Corporis, doloremque, praesentium! Ducimus hic id possimus voluptatum. Autem ducimus laborum quam?
                </p>
            </div>
        </div>
    </div>
    <!-- End Main -->
    <div class="main-news" style="display: flex; margin-top: 40px">
        <div class="articles-list articles">
            <?php foreach ($news as $item): ?>
                <div class="article-block">
                    <a href="<?= \yii\helpers\Url::to(['news/view', 'id' => $item->id]) ?>">
                        <div class="article-block__preview">
                            <img src="<?= $item->getImage() ?>" alt="<?= $item->title ?> title="<?= $item->title ?>">
                        </div>
                        <div class="article-block__description">
                            <div class="article-block__title"><?= $item->title ?></div>
                            <div class="article-block__bottom">
                                <span class="date"><i class="fa fa-calendar"></i> <?= date('d.m.Y H:i', $item->created_at) ?></span>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<!--    <div class="main-feature">-->
<!--        <div class="row">-->
<!--            <div class="col-md-4">-->
<!--                <div class="feature feature--first">-->
<!--                    <div class="feature__title">Материалдар</div>-->
<!--                    <div class="feature__content">Материалы на актуальные темы</div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-4">-->
<!--                <div class="feature feature--second">-->
<!--                    <div class="feature__title">Новости</div>-->
<!--                    <div class="feature__content">Свежие новости про казахстанское и мировое образование</div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-4">-->
<!--                <div class="feature feature--third">-->
<!--                    <div class="feature__title">Олимпиады</div>-->
<!--                    <div class="feature__content">Новинки сайта, интервью на различные темы с интересными людьми</div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</div>