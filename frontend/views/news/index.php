<?php
/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Новости');

$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['news/index']];
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
                            <li class="rbt-breadcrumb-item"><a href="index.html">Басты бет</a></li>
                            <li>
                                <div class="icon-right"><i class="feather-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">Блог</li>
                        </ul>
                        <!-- End Breadcrumb Area  -->

                        <div class=" title-wrapper">
                            <h1 class="title mb--0">БІЛІМ ЖАҢАЛЫҚТАРЫ</h1>
                            <a href="#" class="rbt-badge-2">
                                <div class="image">🎉</div> <?= $dataProvider->totalCount ?> пост
                            </a>
                        </div>

                        <p class="description">Нормативті құжаттар,
                            Білім туралы заңдар,
                            Бағдарламалар
                            Ережелер
                            Қаулылар
                            Білім саласындағы
                            тың жаңалықтар
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner Content Top  -->
    </div>
</div>

<div class="rbt-blog-area rbt-section-overlayping-top rbt-section-gapBottom">
    <div class="container">

        <!-- Start Card Area -->
        <div class="row g-5 mt--15">
            <?= \yii\widgets\ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_item',
                'layout' => '{items}',
                'options' => [
                    'class' => 'articles-list articles'
                ],
                'itemOptions' => [
                    'class' => 'article-block col-lg-4 col-md-6 col-sm-12 col-12'
                ]
            ]) ?>
        </div>
        <!-- End Card Area -->

        <!-- End Card Area -->
        <div class="row">
            <div class="col-lg-12 mt--60">
                <nav>
                    <?= \yii\widgets\LinkPager::widget([
                        'pagination' => $dataProvider->pagination,
                        'options' => [
                            'class' => 'rbt-pagination'
                        ],
                    ]) ?>
                </nav>
            </div>
        </div>


    </div>
</div>
