<?php
use yii\helpers\Url;

$this->title = Yii::t('app', 'Книги');
$this->params['heroTitle'] = $this->title;
$this->params['heroDescription'] = 'КАНИКУЛДА КІТАП ОҚИМЫЗ';

/** @var integer $grade */
?>
<div class="row justify-content-center">
    <div class="col-md-4">
        <a class="btn btn-success" href="<?= \yii\helpers\Url::to(['/marathon/get-cert-thank', 'id' => $marathon_id]) ?>" download>
            <?= Yii::t('app', 'Получить благодарственное письмо') ?>
        </a>
    </div>
</div>
<div class="row">
    <?php if ($grade === 2 || $grade === 3 || $grade === 4): ?>
        <div class="col-md-4">
            <div class="blog-post text-center border-radius-6px bg-white box-shadow box-shadow-large-hover">
                <div class="blog-post-image bg-gradient-fast-blue-purple">
                    <a href="/file/marathon/2.1.pdf"><img src="/img/marathon/2.1.jpg" alt="">
                        <div class="blog-rounded-icon bg-white border-color-white absolute-middle-center">
                            <i class="fa fa-download text-extra-dark-gray icon-extra-small"></i>
                        </div>
                    </a>
                </div>
                <div class="post-details padding-30px-all xl-padding-25px-lr">
                    <a href="/file/marathon/2.1.pdf" class="text-extra-dark-gray font-weight-500 alt-font d-block">ТАҢДАУЛЫ ЕРТЕГІЛЕР</a>
                    <small>Ханс Кристиан Андерсен</small>
                    <div class="mt-3">
                        <a class="btn btn-primary" href="/file/marathon/2.1.pdf"><i class="fa fa-download"></i> <?= Yii::t('app', 'Скачать') ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="blog-post text-center border-radius-6px bg-white box-shadow box-shadow-large-hover">
                <div class="blog-post-image bg-gradient-fast-blue-purple">
                    <a href="/file/marathon/2.2.pdf"><img src="/img/marathon/2.2.jpg" alt="">
                        <div class="blog-rounded-icon bg-white border-color-white absolute-middle-center">
                            <i class="fa fa-download text-extra-dark-gray icon-extra-small"></i>
                        </div>
                    </a>
                </div>
                <div class="post-details padding-30px-all xl-padding-25px-lr">
                    <a href="/file/marathon/2.2.pdf" class="text-extra-dark-gray font-weight-500 alt-font d-block">ЫБЫРАЙ АЛТЫНСАРИННІҢ ӨЛЕҢДЕРІ МЕН ӘҢГІМЕЛЕРІ</a>
                    <small>Ыбырай Алтынсарин</small>
                    <div class="mt-3">
                        <a class="btn btn-primary" href="/file/marathon/2.2.pdf"><i class="fa fa-download"></i> <?= Yii::t('app', 'Скачать') ?></a>
                    </div>
                </div>
            </div>
        </div>
    <?php elseif ($grade === 5 || $grade === 6): ?>
        <div class="col-md-4">
            <div class="blog-post text-center border-radius-6px bg-white box-shadow box-shadow-large-hover">
                <div class="blog-post-image bg-gradient-fast-blue-purple">
                    <a href="/file/marathon/5.pdf"><img src="/img/marathon/5.jpg" alt="">
                        <div class="blog-rounded-icon bg-white border-color-white absolute-middle-center">
                            <i class="fa fa-download text-extra-dark-gray icon-extra-small"></i>
                        </div>
                    </a>
                </div>
                <div class="post-details padding-30px-all xl-padding-25px-lr">
                    <a href="/file/marathon/5.pdf" class="text-extra-dark-gray font-weight-500 alt-font d-block">МЕНІҢ АТЫМ ҚОЖА</a>
                    <small>Бердібек Соқпақбаев</small>
                    <div class="mt-3">
                        <a class="btn btn-primary" href="/file/marathon/5.pdf"><i class="fa fa-download"></i> <?= Yii::t('app', 'Скачать') ?></a>
                    </div>
                </div>
            </div>
        </div>
    <?php elseif ($grade === 7 || $grade === 8): ?>
        <div class="col-md-4">
            <div class="blog-post text-center border-radius-6px bg-white box-shadow box-shadow-large-hover">
                <div class="blog-post-image bg-gradient-fast-blue-purple">
                    <a href="/file/marathon/7.pdf"><img src="/img/marathon/7.jpg" alt="">
                        <div class="blog-rounded-icon bg-white border-color-white absolute-middle-center">
                            <i class="fa fa-download text-extra-dark-gray icon-extra-small"></i>
                        </div>
                    </a>
                </div>
                <div class="post-details padding-30px-all xl-padding-25px-lr">
                    <a href="/file/marathon/7.pdf" class="text-extra-dark-gray font-weight-500 alt-font d-block">Қызыл жебе</a>
                    <small>Шерхан Мұртаза</small>
                    <div class="mt-3">
                        <a class="btn btn-primary" href="/file/marathon/7.pdf"><i class="fa fa-download"></i> <?= Yii::t('app', 'Скачать') ?></a>
                    </div>
                </div>
            </div>
        </div>
    <?php elseif ($grade === 9 || $grade === 10 || $grade === 11): ?>
        <div class="col-md-4">
            <div class="blog-post text-center border-radius-6px bg-white box-shadow box-shadow-large-hover">
                <div class="blog-post-image bg-gradient-fast-blue-purple">
                    <a href="/file/marathon/9.pdf"><img src="/img/marathon/9.jpg" alt="">
                        <div class="blog-rounded-icon bg-white border-color-white absolute-middle-center">
                            <i class="fa fa-download text-extra-dark-gray icon-extra-small"></i>
                        </div>
                    </a>
                </div>
                <div class="post-details padding-30px-all xl-padding-25px-lr">
                    <a href="/file/marathon/9.pdf" class="text-extra-dark-gray font-weight-500 alt-font d-block">Қанмен жазылған кітап</a>
                    <small>Бауыржан Момышұлы</small>
                    <div class="mt-3">
                        <a class="btn btn-primary" href="/file/marathon/9.pdf"><i class="fa fa-download"></i> <?= Yii::t('app', 'Скачать') ?></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
