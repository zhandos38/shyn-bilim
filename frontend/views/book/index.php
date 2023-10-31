<?php
/* @var $this \yii\web\View */

$this->title = 'Балалар кітапханасы';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['book/index']];
$this->params['heroTitle'] = $this->title;
$this->params['heroDescription'] = 'БІЛІМ ШЫҢЫ - ҒЫЛЫМ СЫРЫ';
?>
<div class="rbt-page-banner-wrapper">
    <!-- Start Banner BG Image  -->
    <div class="rbt-banner-image"></div>
    <!-- End Banner BG Image  -->
    <div class="rbt-banner-content">
        <!-- Start Banner Content Top  -->
        <div class="rbt-banner-content-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Start Breadcrumb Area  -->
                        <ul class="page-list">
                            <li class="rbt-breadcrumb-item"><a href="#">Басты бет</a></li>
                            <li>
                                <div class="icon-right"><i class="feather-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">«ШЫҢ» кітапханасы</li>
                        </ul>
                        <!-- End Breadcrumb Area  -->

                        <div class=" title-wrapper">
                            <h1 class="title mb--0">«ШЫҢ» кітапханасы</h1>
                            <a href="#" class="rbt-badge-2">
                                <div class="image">🎉</div> Всего <?= $dataProvider->totalCount ?> книг
                            </a>
                        </div>
                        <p class="description">
                            «ШЫҢ»
                            КІТАПХАНАСЫ,
                            Кітап оқып,
                            табыс тап!
                        </p>
                        <a class="rbt-badge-4" href="<?= \yii\helpers\Url::to(['book/cert']) ?>"><i class="fa fa-download"></i> Сертификат жүктеу</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner Content Top  -->
    </div>
</div>

<div class="rbt-counterup-area rbt-section-overlayping-top rbt-section-gapBottom">
    <div class="container">
        <div class="row row--30 gy-5">
            <div class="col-lg-3 order-2 order-lg-1">
                <aside class="rbt-sidebar-widget-wrapper rbt-gradient-border">
                    <!-- Start Widget Area  -->
                    <div class="rbt-single-widget rbt-widget-tag">
                        <div class="inner">
                            <h4 class="rbt-widget-title">Жас</h4>
                            <div class="rbt-sidebar-list-wrapper rbt-tag-list">
                                <a href="#">0-6</a>
                                <a href="#">6-10</a>
                                <a href="#">11-15</a>
                                <a href="#">15-18</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Widget Area  -->

                    <!-- Start Widget Area  -->
                    <div class="rbt-single-widget rbt-widget-categories has-show-more">
                        <div class="inner">
                            <h4 class="rbt-widget-title">Категория</h4>
                            <ul class="rbt-sidebar-list-wrapper categories-list-check has-show-more-inner-content">
                                <?php foreach ($bookCategories as $index => $bookCategory): ?>
                                <li class="rbt-check-group">
                                    <input id="cat-list-<?= $index ?>" type="checkbox" name="cat-list-<?= $index ?>">
                                    <label for="cat-list-<?= $index ?>"><?= $bookCategory->name ?></label>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="rbt-show-more-btn">Подробнее</div>
                    </div>
                    <!-- End Widget Area  -->
                </aside>
            </div>
            <div class="col-lg-9 order-1 order-lg-2">

                <?= \yii\widgets\ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_item',
                    'layout' => '{items}{pager}',
                    'options' => [
                        'class' => 'rbt-course-grid-column'
                    ],
                    'itemOptions' => [
                        'class' => 'course-grid-3'
                    ]
                ]) ?>

            </div>
        </div>
    </div>
</div>

