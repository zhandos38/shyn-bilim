<?php

use yii\bootstrap\Html;


echo '<div>' . Html::a('<img src="/img/kz-flag.png" alt="kz" height="16">', array_merge(
        \Yii::$app->request->get(),
        [\Yii::$app->controller->route, 'language' => 'kz']
    ),
    [
        'class' => 'navbar-language'
    ]) . Html::a('<img src="/img/ru-flag.png" alt="kz" height="16">', array_merge(
            \Yii::$app->request->get(),
            [\Yii::$app->controller->route, 'language' => 'ru']
        ),
    [
        'class' => 'navbar-language'
    ]) . '</div>';