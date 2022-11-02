<?php

use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\MaskedInput;

$this->title = 'Марафон';
$this->params['heroTitle'] = $this->title;
$this->params['heroDescription'] = 'КАНИКУЛДА КІТАП ОҚИМЫЗ';

/** @var $checkAssignmentForm \frontend\models\CheckAssignmentForm  */
?>
<div class="row">
    <div class="col-md-12">
        <div class="text-center font-weight-bold">
            Сәлеметсің бе, қымбатты оқушы! <br>
            «КАНИКУЛДА КІТАП ОҚИМЫЗ» <br>
            МАРАФОНЫНА ҚОШ КЕЛДІҢ!
        </div>
        <ul>
            <li>Марафонға қатысу арқылы кітап оқуға белсенділігің артады;</li>
            <li>Ата-анаңмен бірлесе оқып, отбасылық кітап оқу дәстүрін жаңғыртасың;</li>
            <li>Рухани байлығың, жалпы ой-өрісің дамиды, жоғары эстетикалық талап-талғамың қалыптасады.</li>
            <li>Электронды кітаптарды оқуды меңгересің;</li>
            <li>BookCrossing кітап алмасу қозғалысын дамытасың;</li>
            <li>Кітап оқу арқылы білімнің, ізгіліктің биік шыңына көтерілесің;</li>
            <li>Кітап сенің ақылшың, сыршыл әрі шынайы досыңа айналады.</li>
            <li>1 қарашада https://bilim-shini.kz/ru сайтында өтеді. Кітап оқу ТЕГІН!!!</li>
        </ul>
        <div class="text-center font-weight-bold">
            <button id="toggleBtn" class="btn btn-success">Толығырақ</button>
        </div>
        <div id="toggleText" style="display: none">
            <p><strong>І. БІРІНШІ  КЕЗЕҢ – КІТАП ОҚУ</strong></p>
            <ul>
                <li>«КАНИКУЛДА КІТАП ОҚИМЫЗ» марафонына ҚАТЫСАМЫН батырмасын бас.</li>
                <li>Анкетаны қатесіз толтыр.</li>
                <li>Кітапты жүктеп ал.</li>
                <li>Өзіңе Сертификат, ата-анаға Алғыс хат! Жүктеп алуды ұмытпа!!!</li>
                <li>10 қарашаға дейін кітапты оқып бітіруді ұмытпа!</li>
                <li>Оқуды қазірден баста. Қатарыңнан қалыс қалма! Каникулда кітап оқып, Сыйлыққа кітап ұтып ал да, МЕКТЕБІҢЕ сыйла!</li>
            </ul>
            <p>&nbsp;</p>
            <p><strong>ІІ.</strong><strong>ЕКІНШІ КЕЗЕҢ &ndash; КІТАП ЖАРЫСЫ</strong></p>
            <p><strong>&nbsp;&laquo;КАНИКУЛДА КІТАП ОҚИМЫЗ&raquo; </strong></p>
            <p>марафонына қатысып, кітапты оқып алып, 10-15 қараша аралығында өтетін&nbsp;</p>
            <p><strong>&laquo;ЕҢ КӨП КІТАП ОҚИТЫН ОҚУШЫ&raquo;</strong> байқауында біліміңді сынауыңа болады. Бұл байқау ақылы. Жарнасы &ndash; 1000 тг. Байқауға ерікті түрде ата-анаңның рұқсатымен қатыса аласың. Ол үшін ЕРЕЖЕМЕН таныс бол.</p>
            <p><strong>БАЙҚАУ ҚАТЫСУШЫЛАРЫ</strong></p>
            <p><strong>2.1. &laquo;ЕҢ КӨП КІТАП ОҚИТЫН ОҚУШЫ&raquo;</strong> байқауына<strong> оқыған кітабы бойынша </strong>2-11 қазақ сынып оқушылары қатыса алады.</p>
            <p><strong>2.2.</strong> Байқау сұрақтары оқыған кітап бойынша 20 тест сұрақтан тұрады. А, В, С, Д, Е жауаптарының ішінде дұрыс жауап жасырынған.</p>
            <p><strong>2.3.</strong> Жорға, Бәйге ойындары секілді әр сұраққа белгілі уақыт бекітілген. Әр сұраққа 24 секунд, 20 сұраққа жауап беру үшін барлығы 12 минут уақыт беріледі.</p>
            <p><strong>ІІІ. ҚАТЫСУ ТӘРТІБІ:</strong></p>
            <p><strong>3.1.</strong><a href="http://bilimshini.kz/">http://bilimshini.kz/</a> сайтындағы МАРАФОН батырмасын басу.</p>
            <p><em>(10-15 қараша </em>&nbsp;<em>тәулік бойы жұмыс жасайды).</em></p>
            <p><strong>3.2.</strong><strong>ЖСН-ді теру.</strong><em> (қатысушы міндетті түрде каникулда кітапты оқыған болуы керек)</em></p>
            <p><strong>3.4. Жіберу батырмасын басу.</strong></p>
            <p><strong>3.5</strong>. <strong>Төлем жасау беті ашылады, </strong>кез-келген төлеу картасымен (ата-ананың рұқсатымен) төлем жасағаннан кейін Байқау тапсырмалары бірден ашылады. Сайттан шықпай, тапсырманы орындау шарт.</p>
            <p><strong>3.6.</strong> Сайттан төлем жасау қиындық туғызған жағдайда, 8775 403 72 84 Жанна Каспий голд номеріне жарнаны аударып, ЖСН тіркетіп алу керек. Жарна төленгені туралы чекті және оқушы ЖСН-нін <a href="https://wa.me/77754037284">https://wa.me/77754037284</a> немесе</p>
            <p><a href="https://wa.me/77013129906">https://wa.me/77013129906</a> Білім шыңы</p>
            <p>вадсап номердің біріне жазып жіберу керек. &laquo;Тіркелді&raquo; деген жауап келгеннен кейін сайтқа кіріп, тестті орындауға болады.</p>
            <p><strong>3.7.</strong> Тестті орындау аяқталған соң, дұрыс жауаптар саны шығады.</p>
            <p><strong>3.8.</strong> Нәтиже батырмасын басып, марапат қағаздарды бірден сақтап алу керек.</p>
            <p><strong>3.9.</strong> Егер 12 минутта 20 сұраққа дұрыс жауап берсең, <strong>&laquo;ЕҢ КӨП КІТАП ОҚИТЫН ОҚУШЫ&raquo; </strong>номинациясы бойынша марапатқа ие боласың! Жеңімпаз оқушы арнайы медальмен, Дипломмен марапатталады. Сынып жетекшіге, ата-анаға Алғыс хат беріледі. Бас жүлде иегерінің Марапаттары түпнұсқасы Қазпошта арқылы жіберіледі.</p>
            <ol>
                <li><strong> БАЙҚАУ ЖЕҢІМПАЗДАРЫН МАРАПАТТАУ</strong></li>
            </ol>
            <p><strong>4.1.</strong> Бас жүлде &ndash; 20 дұрыс жауап. <strong>МЕДАЛЬ + ДИПЛОМ + Жетекші мұғалімге АЛҒЫС ХАТ + Ата-анаға АЛҒЫС ХАТ</strong></p>
            <p><strong>4.2.</strong> І орын &ndash; 18-19 дұрыс жауап. Оқушыға <strong>І ДӘРЕЖЕЛІ ДИПЛОМ <em>(электронды нұсқа)</em></strong></p>
            <p><strong>4.3.</strong> ІІ орын &ndash; 16-17 дұрыс жауап<strong>. </strong>Оқушыға<strong> ІІ ДӘРЕЖЕЛІ ДИПЛОМ</strong><strong><em>(электронды нұсқа)</em></strong></p>
            <p><strong>4.4.</strong> ІІІ орын &ndash; 14-15 дұрыс жауап. Оқушыға<strong> ІІІ ДӘРЕЖЕЛІ ДИПЛОМ<em> (электронды нұсқа)</em></strong></p>
            <p><strong>4.5.</strong> Орын алмаған оқушыларға <strong>СЕРТИФИКАТ.</strong><strong><em> (электронды)</em></strong></p>
            <p><a href="https://wa.me/77754037284">https://wa.me/77754037284</a></p>
            <p><a href="https://wa.me/77013129906">https://wa.me/77013129906</a></p>
            <p><a href="https://wa.me/77750767876">https://wa.me/77750767876</a></p>

            <a class="btn btn-success" href="<?= Url::to(['site/subscribe']) ?>">Жазылу</a>
        </div>
    </div>
    <div class="col-md-4">
        <div>
            <a id="check-assignment-btn" href="javaScript:void(0);" style="color: blue">
                <?= Yii::t('app', 'Вы уже заполняли анкету?') ?>
            </a>

            <div id="check-assignment-form" class="mb-5" style="display: none">
                <?php $form = ActiveForm::begin(['action' => ['marathon/check-assignment']]) ?>

                <?= $form->field($checkAssignmentForm, 'iin') ?>

                <?= \yii\bootstrap4\Html::submitButton(Yii::t('app', 'Перейти к книгам'), ['class' => 'btn btn-success']) ?>

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
        <small class="text-secondary"><?= Yii::t('app', 'Если вы не нашли вашу школу, напишите нам +7(701) 312 99 06 (Whatsapp)') ?></small>

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

        <?= $form->field($model, 'parent_name') ?>

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

$('#check-assignment-btn').click(function() {
  $('#check-assignment-form').toggle('ease');
});
JS;


$this->registerJs($js);
?>
