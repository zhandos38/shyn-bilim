<?php
use common\models\Book;

/* @var $model Book */
?>
<div class="rbt-card variation-01 rbt-hover">
    <div class="rbt-card-body">
        <div class="rbt-card-img">
            <a href="#">
                <img src="<?= $model->getImage() ?>" alt="Card image">
            </a>
        </div>

        <h4 class="rbt-card-title"><a href="#"><?= $model->name ?></a>
        </h4>

        <!--            <p class="rbt-card-text">-->
        <!--                It is a long established fact that a reader will be distracted.-->
        <!--            </p>-->
        <div class="rbt-card-bottom">
            <a class="rbt-btn-link" href="<?= $model->getFile() ?>" download="<?= $model->file ?>">
                Жүктеу
                <i class="fa fa-download"></i>
                <!--                    <i class="feather-arrow-right"></i>-->
            </a>
        </div>
    </div>
</div>
