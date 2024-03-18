<?php
use yii\helpers\Url;

/** @var \common\models\ArticleMagazine $magazines */

$this->title = 'Журналдар';
$this->params['heroTitle'] = $this->title;
$this->params['heroDescription'] = 'БІЛІМ ШЫҢЫ - ҒЫЛЫМ СЫРЫ';
?>
<div class="bg-gradient-5">
    <div class="container pt--60 pb--60">
        <div class="section-title text-center mb--30">
            <h2 class="title">Журналдар</h2>
        </div>
        <div class="row justify-content-center">
            <?php foreach ($magazines as $magazine): ?>
                <div class="col-md-3">
                    <div class="menu-card magazine-card">
                        <a href="<?= Url::to(['article/view', 'articleMagazineId' => $magazine->id]) ?>">
                            <div>
                                <div>
                                    <img class="menu-card__img magazine-img" src="<?= $magazine->getImage() ?>" alt="menu-icon">
                                </div>
                                <div class="menu-card__text-box">
                                    <h5 class="mb--10"><?= $magazine->name ?></h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<style>
    .magazine-card {
        height: auto;
    }
    .magazine-img {
        height: 100% !important;
    }
</style>