<?php

$this->title = Yii::t('app', 'Главная страница');
?>
<div class="container">
    <!-- Begin Main -->
    <div class="main-block">
        <div class="main-block__title" style="display: flex; align-items: center">
            <img src="/img/logo.png" alt="logo" style="width: 120px;">
            <span style="margin-left: 10px; font-size: 3.8rem; font-weight: 600; color: #3f85e7">BILIMSHINI</span>
        </div>
    </div>
    <!-- End Main -->
    <div class="main-news" style="display: flex; margin-top: 260px">
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