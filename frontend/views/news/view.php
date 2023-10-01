<?php
/* @var $this \yii\web\View */
/* @var $model \common\models\News */

$this->title = $model->title;
?>
<div class="rbt-overlay-page-wrapper">
    <div class="breadcrumb-image-container breadcrumb-style-max-width">
        <div class="breadcrumb-image-wrapper">
            <img src="/images/bg/bg-image-10.jpg" alt="Education Images">
        </div>
        <div class="breadcrumb-content-top text-center">
            <ul class="meta-list justify-content-center mb--10">
                <li class="list-item">
                    <i class="feather-clock"></i>
                    <span><?= date('d.m.Y H:i', $model->created_at) ?></span>
                </li>
            </ul>
            <h1 class="title"><?= $this->title ?></h1>
        </div>
    </div>

    <div class="rbt-blog-details-area rbt-section-gapBottom breadcrumb-style-max-width">
        <div class="blog-content-wrapper rbt-article-content-wrapper">
            <div class="content">
                <div class="post-thumbnail mb--30 position-relative wp-block-image alignwide">
                    <img src="<?= $model->getImage() ?>" alt="Blog Images">
                </div>
                <?= $model->content ?>
            </div>
        </div>
    </div>
</div>
