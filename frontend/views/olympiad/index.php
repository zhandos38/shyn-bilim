<?php
use yii\helpers\Url;
use common\models\Subject;

/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Олимпиады');
$this->params['breadcrumbs'][] = ['label' => 'Выбор типа олимпиады', 'url' => ['olympiad/choose']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['olympiad/index']];
$this->params['heroTitle'] = $this->title;
$this->params['heroDescription'] = 'БІЛІМ ШЫҢЫ - ҒЫЛЫМ СЫРЫ';
?>
<div class="olympiad-index" style="padding-bottom: 80px">
    <div class="row">
        <?php /** @var \common\models\Olympiad $olympiad */
        foreach ($olympiads as $olympiad): ?>
            <div class="col-md-4">
                <div class="blog-post text-center border-radius-6px bg-white box-shadow box-shadow-large-hover">
                    <div class="blog-post-image bg-gradient-fast-blue-purple">
                        <a href="<?= Url::to(['olympiad/view', 'id' => $olympiad->id]) ?>"><img src="<?= $olympiad->getImage() ?>" alt="">
                            <div class="blog-rounded-icon bg-white border-color-white absolute-middle-center">
                                <i class="feather icon-feather-arrow-right text-extra-dark-gray icon-extra-small"></i>
                            </div>
                        </a>
                    </div>
                    <div class="post-details padding-30px-all xl-padding-25px-lr">
                        <a href="#" class="post-author text-medium text-uppercase"><?= $olympiad->getType() ?></a>
                        <a href="<?= Url::to(['olympiad/view', 'id' => $olympiad->id]) ?>" class="text-extra-dark-gray font-weight-500 alt-font d-block"><?= $olympiad->name ?></a>
                        <a href="<?= $olympiad->getFile() ?>" class="btn btn-extra-large btn-link text-extra-dark-gray"><?= Yii::t('app', 'Положение') ?></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
