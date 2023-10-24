<?php
/* @var $model \common\models\News */

?>
<div class="rbt-card variation-02 rbt-hover">
    <div class="rbt-card-img">
        <a href="<?= \yii\helpers\Url::to(['news/view', 'id' => $model->id]) ?>">
            <img src="<?= $model->getImage() ?>" alt="Card image">
        </a>
    </div>
    <div class="rbt-card-body">
        <h5 class="rbt-card-title"><a href="<?= \yii\helpers\Url::to(['news/view', 'id' => $model->id]) ?>"><?= $model->title ?></a></h5>
        <div class="rbt-card-bottom">
            <a class="transparent-button" href="<?= \yii\helpers\Url::to(['news/view', 'id' => $model->id]) ?>">Толығырақ
                <i>
                    <svg width="17" height="12" xmlns="http://www.w3.org/2000/svg"><g stroke="#27374D" fill="none" fill-rule="evenodd">
                            <path d="M10.614 0l5.629 5.629-5.63 5.629"></path><path stroke-linecap="square" d="M.663 5.572h14.594"></path></g>
                    </svg>
                </i>
            </a>
        </div>
    </div>
</div>