<?php

use common\models\School;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this \yii\web\View */
/* @var $model \common\models\TestAssignment */

$this->title = Yii::t('app', 'Регистрация');

$this->params['heroTitle'] = $this->title;
$this->params['heroDescription'] = 'БІЛІМ ШЫҢЫ - ҒЫЛЫМ СЫРЫ';
?>
<h1><?= Yii::t('site', 'Марафон') ?></h1>
<p>
    <?= Yii::t('app', 'Заполните форму для участия в данной олимпиаде. Стоимость составляет {tenge} тенге', ['tenge' => '1000']) ?>
    <?php if (Yii::$app->language === 'ru'): ?>
        Отправляя данные вы соглашаетесь с условиями <a style="color: red" href="<?= '/file/offer.pdf' ?>" target="_blank">публичной оферты</a>
    <?php else: ?>
        Мәліметтерді жібере отырып, <a style="color: red" href="<?= '/file/offer.pdf' ?>" target="_blank">қоғамдық ұсыныспен</a> келісесіз
    <?php endif; ?>
</p>
<div >
    <div class="text-center">
        <h6>
            Сәлеметсің бе, қымбатты оқушы!
        </h6>

        <p>
            15 қарашадан - 1 желтоқсан күндері өтетін «ЕҢ КӨП КІТАП ОҚИТЫН ОҚУШЫ» БАЙҚАУЫНА ҚОШ КЕЛДІҢ!
            Байқауға қатысу ақылы. Ата-ананың рұқсатымен қатысуға болады.
            <br><a id="toggleBtn" style="color: blue" href="#">Толығырақ</a>
        </p>
    </div>


    <div id="toggleText" style="display: none">
        <p>І. БАЙҚАУҒА ҚАТЫСУ ТӘРТІБІ:</p>
        <p>1.1. <a href="https://bilimshini.kz/kz/marathon/assignment">Анкетаны толтырып қойғансыз ба?</a> &ndash; үстінен басып, &nbsp;ЖСН-ді теру;</p>
        <p>1.2. Анкетаға Мұғалімнің және ата-ананың аты-жөнін жазу;</p>
        <p>1.3. ЖІБЕРУ батырмасын басу;</p>
        <p>1.4. Төлем жасау беті ашылады, кез-келген төлеу картасымен (ата-ананың рұқсатымен) төлем жасағаннан кейін Байқау тапсырмалары бірден ашылады. Сайттан шықпай, тапсырманы орындау шарт;</p>
        <p>1.6. Сайттан төлем жасау қиындық туғызған жағдайда, 8775 403 72 84 Жанна, 8775 424 37 27 Ферузаның&nbsp; Каспий голд номерлерінің біріне жарнаны аударып, ЖСН тіркетіп алу керек. Жарна төленгені туралы чекті және оқушы ЖСН-нін вадсап номердің біріне жазып жіберу керек.&nbsp; &laquo;Тіркелді&raquo; деген жауап келгеннен кейін сайтқа кіріп, тестті орындауға болады;</p>
        <p>1.7. Тестті&nbsp; орындау аяқталған соң, дұрыс жауаптар саны шығады;</p>
        <p>1.8. Нәтиже батырмасын басып, марапат қағаздарды бірден сақтап алу керек;</p>
        <p>1.9. Әр сұраққа жауапқа - 40 секунд беріледі. 30 сұраққа 20 минут беріледі.</p>
        <p>&nbsp;</p>
        <ol>
            <li>БАЙҚАУ ЖЕҢІМПАЗДАРЫН МАРАПАТТАУ</li>
        </ol>
        <p>4.1. Бас жүлде &ndash; 30 дұрыс жауап. МЕДАЛЬ + ДИПЛОМ + Мұғалімге АЛҒЫС ХАТ + Ата-анаға АЛҒЫС ХАТ</p>
        <p>4.2. І орын &ndash; 28-29 дұрыс жауап. Оқушыға І ДӘРЕЖЕЛІ ДИПЛОМ + Мұғалімге АЛҒЫС ХАТ + Ата-анаға АЛҒЫС ХАТ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;(электронды нұсқа)</p>
        <p>4.3. ІІ орын &ndash; 25-27 дұрыс жауап. Оқушыға ІІ ДӘРЕЖЕЛІ ДИПЛОМ + Мұғалімге АЛҒЫС ХАТ + Ата-анаға АЛҒЫС ХАТ&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(электронды нұсқа)</p>
        <p>4.4. ІІІ орын &ndash; 20-24&nbsp; дұрыс жауап. Оқушыға ІІІ ДӘРЕЖЕЛІ ДИПЛОМ + Мұғалімге АЛҒЫС ХАТ + Ата-анаға АЛҒЫС ХАТ&nbsp;&nbsp;&nbsp; (электронды нұсқа)</p>
        <p>4.5. Орын алмаған оқушыларға СЕРТИФИКАТ + Жетекші мұғалімге АЛҒЫС ХАТ + Ата-анаға АЛҒЫС ХАТ &nbsp;(электронды)</p>
        <p>Сұрақтарыңыз болса:<br /> <a href="https://wa.me/77754037284">https://wa.me/77754037284</a><br /> <a href="https://wa.me/77754243727">https://wa.me/77754243727</a><br /> <a href="https://bilimshini.kz/">http://bilimshini.kz/</a>&nbsp;</p>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div>
            <a id="check-assignment-btn" href="#" style="color: blue">
                <?= Yii::t('app', 'Вы уже заполняли анкету?') ?>
            </a>

            <div id="check-assignment-form" class="mb-5" style="display: none">
                <?php $form = ActiveForm::begin(['action' => ['olympiad/assignment']]) ?>

                <?= $form->field($checkAssignmentForm, 'iin') ?>

                <?= \yii\bootstrap4\Html::submitButton(Yii::t('app', 'Отправить'), ['class' => 'btn btn-success']) ?>

                <?php ActiveForm::end() ?>
            </div>
        </div>

        <?php $form = ActiveForm::begin() ?>

        <?= $form->field($model, 'surname') ?>

        <?= $form->field($model, 'name') ?>

        <?= $form->field($model, 'patronymic') ?>

        <?= $form->field($model, 'iin') ?>

        <?= $form->field($model, 'region_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(\common\models\Region::find()->asArray()->all(), 'id', 'name'),
            'options' => ['placeholder' => Yii::t('app', 'Укажите регион')],
        ]); ?>

        <?= $form->field($model, 'city_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(\common\models\City::find()->asArray()->all(), 'id', 'name'),
            'options' => ['placeholder' => Yii::t('app', 'Укажите город')],
        ]); ?>

        <?= $form->field($model, 'school_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(\common\models\School::find()->asArray()->all(), 'id', function ($model) {
                return htmlspecialchars_decode($model['name']);
            }),
            'options' => ['placeholder' => Yii::t('app', 'Укажите школу')],
        ]); ?>
        <small class="text-secondary"><?= Yii::t('app', 'Если вы не нашли вашу школу, напишите нам bilimshini.kz@mail.ru') ?></small>

        <?= $form->field($model, 'grade')->dropDownList([
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
            6 => '6',
            7 => '7',
            8 => '8',
            9 => '9',
            10 => '10',
            11 => '11'
        ], [
            'prompt' => Yii::t('app', 'Выберите класс')
        ]) ?>

        <?= $form->field($model, 'leader_name')->textInput(['id' => 'leader-name-input']) ?>

        <?= $form->field($model, 'parent_name')->textInput() ?>

        <?= \yii\bootstrap4\Html::submitButton(Yii::t('app', 'Отправить'), ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end() ?>
    </div>
</div>
<?php
$js =<<<JS
$('#testassignment-region_id').change(function() {
  $.get({
    url: '/kz/site/get-cities',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#testassignment-city_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});

$('#testassignment-city_id').change(function() {
  $.get({
    url: '/kz/site/get-schools',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#testassignment-school_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});

$('#check-assignment-btn').click(function() {
  $('#check-assignment-form').toggle('ease');
});

$('#toggleBtn').click(function() {
  $('#toggleText').toggle('ease');
});
JS;


$this->registerJs($js);
?>
