<?php

/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Учебный центр');

$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['site/about']];
?>
<div class="site-edu">
    <img src="/img/edu-bng.png" alt="img" style="width: 100%;">
    <div class="site-edu__container">
        <div class="row">
            <div class="col-md-4">
                <img src="/img/keremet.png" alt="img" style="width: 100%">
            </div>
            <div class="col-md-4">
                <img src="/img/maksat.png" alt="img" style="width: 100%">
            </div>
            <div class="col-md-4">
                <div class="site-edu__feature">
                    Баланы мектептен тасымалмен жеткізу
                </div>
                <div class="site-edu__feature">
                    Білікті педагогпен үй тапсырмасын орындау
                </div>
                <div class="site-edu__feature">
                    Тәрбиеші қадағалауымен таза ауада ойнау
                </div>
                <div class="site-edu__feature">
                    Спорттық орындармен және шығармашылықпен айналысу (үстел тенисі, шахмат, сурет салу)
                </div>
                <div class="site-edu__feature">
                    2 мезгіл тамақтану
                </div>
            </div>
        </div>
    </div>
</div>