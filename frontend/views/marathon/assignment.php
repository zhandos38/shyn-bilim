<?php

use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\MaskedInput;

$this->title = 'Марафон';
$this->params['heroTitle'] = $this->title;
$this->params['heroDescription'] = 'КАНИКУЛДА КІТАП ОҚИМЫЗ';
?>
<div class="row">
    <div class="col-md-12">
        <div class="text-center font-weight-bold">
            Сәлеметсің бе, қымбатты оқушы! <br>
            2-11 қазақ сыныптары оқушыларына арналған <br>
            «КАНИКУЛДА КІТАП ОҚИМЫЗ» атты республикалық марафонға қош келдің!
        </div>
        <ul>
            <li>Марафонға қатысу арқылы кітап оқуға белсенділігің артады</li>
            <li>Ата-анаңмен бірлесе оқып, отбасылық кітап оқу дәстүрін жаңғыртасың</li>
            <li>Рухани байлығың, жалпы ой-өрісің дамиды, жоғары эстетикалық талап-талғамың қалыптасады</li>
            <li>Электронды кітаптарды оқуды меңгересің</li>
            <li>BookCrossing кітап алмасу қозғалысын дамытасың</li>
            <li>Кітап оқу арқылы білімнің, ізгіліктің биік шыңына көтерілесің</li>
            <li>Кітап сенің ақылшың, сыршыл әрі шынайы досыңа айналады</li>
        </ul>
        <div class="text-center font-weight-bold">
            Кітап оқуда саған сәттілік тілейміз!
            <a id="toggleBtn" style="color: blue" href="#">Толығырақ</a>
        </div>
        <div id="toggleText" style="display: none">
            <p>КАНИКУЛДА КІТАП ОҚЫП БӘРІҢІЗ,</p>
            <p>БІЗДЕН СЫЙҒА ЖАҚСЫ КІТАП АЛЫҢЫЗ!</p>
            <p>КАНИКУЛДА КІТАП ОҚИМЫЗ&raquo; атты республикалық марафон еліміздегі мектептер арасынан &laquo;BILIMSHINI.KZ сайтына ең көп оқушысы кіріп, кітап оқығанын салыстыру арқылы &laquo;ЕҢ КӨП КІТАП ОҚИТЫН МЕКТЕП&raquo; номинациясы бойынша 30 жеңімпаз мектепті анықтаймыз. Қазақстан Республикасының Тәуелсіздігіне 30 жыл толуына орай республика бойынша анықталып жеңімпаз болған 30 мектепке 30 кітап сыйлаймыз және &laquo;Республикалық &laquo;Ең көп кітап оқитын мектеп&raquo; марафонының жеңімпазы&raquo; Сертификатымен марапаттаймыз.</p>
            <p>МАРАФОНҒА ҚАТЫСУ ЕРЕЖЕСІ:</p>
            <ul>
                <li>КАНИКУЛДА КІТАП ОҚИМЫЗ&raquo; марафоны 1 қарашада https://bilimshini.kz/ru сайтында басталады.</li>
                <li>Анкетаны қатесіз толтырып, ТІРКЕЛУ.</li>
                <li>КІТАПҚА ӨТУ батырмасын басу.</li>
                <li>Кітапты жүктеп алу.</li>
                <li>Оқуды қазірден баста. Қатарыңнан қалыс қалма! Каникулда кітап оқып, 30 кітапты ұтып ал да, кітапты МЕКТЕБІҢЕ сыйла!</li>
                <li>15 қарашаға дейін кітапты оқып бітіруді ұмытпа!</li>
            </ul>
            <p>Сұрақтар бойынша: 8775 403 72 84, 8775 424 37 27 вадсап номерлеріне жазуға болады.</p>

            <a class="btn btn-success" href="<?= Url::to(['site/subscribe']) ?>">Жазылу</a>
        </div>
    </div>
    <div class="col-md-4">
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
        <small class="text-secondary"><?= Yii::t('app', 'Если вы не нашли вашу школу, напишите нам 8(775) 403-72-84 (Whatsapp)') ?></small>

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

        <?= $form->field($model, 'phone')->widget(MaskedInput::className(), [
            'mask' => '+7(999)999-99-99',
            'clientOptions' => [
                'removeMaskOnSubmit' => true
            ],
            'options' => [
                'placeholder' => '7(000) 000-00-00'
            ]
        ]) ?>

        <?= $form->field($model, 'phone_teacher')->widget(MaskedInput::className(), [
            'mask' => '+7(999)999-99-99',
            'clientOptions' => [
                'removeMaskOnSubmit' => true
            ],
            'options' => [
                'placeholder' => '7(000) 000-00-00'
            ]
        ]) ?>

        <?= $form->field($model, 'phone_parent')->widget(MaskedInput::className(), [
            'mask' => '+7(999)999-99-99',
            'clientOptions' => [
                'removeMaskOnSubmit' => true
            ],
            'options' => [
                'placeholder' => '7(000) 000-00-00'
            ]
        ]) ?>

        <?= \yii\bootstrap4\Html::submitButton(Yii::t('app', 'Перейти к книгам'), ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end() ?>
    </div>
</div>
<?php
$js =<<<JS
$('#marathon-region_id').change(function() {
  $.get({
    url: '/kz/site/get-cities',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#marathon-city_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});

$('#marathon-city_id').change(function() {
  $.get({
    url: '/kz/site/get-schools',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#marathon-school_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});

$('#toggleBtn').click(function() {
  $('#toggleText').toggle('ease');
});
JS;


$this->registerJs($js);
?>