<?php
use common\models\Subject;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $subjects Subject */
/* @var $subject Subject */

$this->title = Yii::t('app', 'Материалы');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['article/index']];
$this->params['heroTitle'] = $this->title;
$this->params['heroDescription'] = 'БІЛІМ ШЫҢЫ - ҒЫЛЫМ СЫРЫ';
?>
<div>
    <?php if (Yii::$app->language === 'kz'): ?>
        <p>
            «Материал жариялау» бөлімінен -   сабақ жоспарларын, ашық сабақтар мен тәрбие сағаттарын және басқа да мұғалімдерге керекті құжаттарды таба аласыз.
        </p>
        <p>
            <b>СӘЛЕМЕТСІЗ БЕ, ҚҰРМЕТТІ ПЕДАГОГ!</b><br>
            Сіз «Білім шыңы-Ғылым сыры» журналының электронды сайтында материалыңызды жариялап, портфолиоға 100 % жарамды QR коды бар Сертификатты иемдене аласыз.
            <a id="toggleBtn" style="color: blue" href="#">Толығырақ</a>
        </p>
        <div id="toggleText" style="display: none">
            <p>
                Сіздің материалыңыз біздің сайттың МАТЕРИАЛ ЖАРИЯЛАУ базасына түседі, бұл  педагогтардың тәжірибе алаңын құрады.
            </p>
            <p>
                Жарияланым туралы Сертификатты өз портфолиоңызға қосып, аттестаттау комиссиясының лайықты бағасын иеленесіз, осылайша біліктілік санатыңызды арттыра аласыз.
            </p>
            <p>
                Сұрақтар бойынша: 8708 317 65 16, 8701 590 79 16 вадсап номерлеріне жазуыңызға болады.
            </p>


            <a class="btn btn-success" href="<?= Url::to(['site/subscribe']) ?>">Тіркелу</a>
        </div>
    <?php else: ?>
        <p>
            «Материал жариялау» бөлімінен -   сабақ жоспарларын, ашық сабақтар мен тәрбие сағаттарын және басқа да мұғалімдерге керекті құжаттарды таба аласыз.
        </p>
        <p>
            <b>СӘЛЕМЕТСІЗ БЕ, ҚҰРМЕТТІ ПЕДАГОГ!</b><br>
            Сіз «Білім шыңы-Ғылым сыры» журналының электронды сайтында материалыңызды жариялап, портфолиоға 100 % жарамды QR коды бар Сертификатты иемдене аласыз.
            <a id="toggleBtn" style="color: blue" href="#">Толығырақ</a>
        </p>
        <div id="toggleText" style="display: none">
            <p>
                Сіздің материалыңыз біздің сайттың МАТЕРИАЛ ЖАРИЯЛАУ базасына түседі, бұл  педагогтардың тәжірибе алаңын құрады.
            </p>
            <p>
                Жарияланым туралы Сертификатты өз портфолиоңызға қосып, аттестаттау комиссиясының лайықты бағасын иеленесіз, осылайша біліктілік санатыңызды арттыра аласыз.
            </p>
            <p>
                Сұрақтар бойынша: 8708 317 65 16, 8701 590 79 16 вадсап номерлеріне жазуыңызға болады.
            </p>


            <a class="btn btn-success" href="<?= Url::to(['site/subscribe']) ?>">Тіркелу</a>
        </div>
    <?php endif; ?>
    <a class="article-order-widget__link btn btn-success" href="<?= Url::to(['article/order']) ?>">
        <?= Yii::t('app', 'Опубликовать материал') ?>
    </a>
</div>
<div class="row" style="padding-top: 20px">
    <?php foreach ($subjects as $subject): ?>
    <div class="col-md-3">
        <a class="subject-list__item" style="background: linear-gradient(90deg, rgba(0,0,0,0.4) 10%, rgba(0,0,0,0.4) 40%), url('<?= '/img/' . $subject->img ?>')" href="<?= Url::to(['article/list', 'id' => $subject->id]) ?>">
            <h5><?= $subject->getName() ?></h5>
        </a>
    </div>
    <?php endforeach; ?>
</div>
<?php
$js =<<<JS
$('#toggleBtn').click(function() {
  $('#toggleText').toggle('ease');
});
JS;

$this->registerJs($js);
?>