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
            <ul>
                <li>&laquo;КАНИКУЛДА КІТАП ОҚИМЫЗ&raquo; марафоны 1 қарашада https://bilimshini.kz/ru сайтында басталады.</li>
                <li>ЕРЕЖЕмен толық таныс болған соң, АНКЕТА бетке өту.</li>
                <li>Анкетаны қатесіз толтырып шық.</li>
                <li>КІТАПҚА ӨТУ батырмасын бас.</li>
                <li>Өз сыныбың бойынша берілген кітапты ЖҮКТЕУ батырмасын басу арқылы кітапты жүктеп ал. Кітапты жүктеп алу ТЕГІН.</li>
                <li>Оқуды қазірден баста. Қатарыңнан қалыс қалма! Каникулда жаппай кітап оқып, 30 кітапты ұтып ал да, кітапты МЕКТЕБІҢЕ сыйла!</li>
                <li>15 қарашаға дейін кітапты оқып бітіруді ұмытпа!</li>
            </ul>
            <p>&nbsp;</p>
            <p>&laquo;КАНИКУЛДА КІТАП ОҚИМЫЗ&raquo; марафонына қатысып, кітапты оқып ал да</p>
            <p>15-22 қараша аралығында өтетін&nbsp; &laquo;ЕҢ КӨП КІТАП ОҚИТЫН ОҚУШЫ&raquo; байқауына ерікті түрде қатысуыңа болады. Ол үшін ЕРЕЖЕМЕН таныс бол.</p>
            <p>&nbsp;</p>
            <p>ӨТЕТІН УАҚЫТЫ МЕН ОРНЫ:</p>
            <p>2021 жылдың 15-22 қараша күндері аралығында <a href="http://bilimshini.kz/">http://bilimshini.kz/</a> сайтында 1 кезеңмен өтеді.</p>
            <p>&nbsp;</p>
            <p>ІІ. БАЙҚАУ ҚАТЫСУШЫЛАРЫ</p>
            <p>2.1. &laquo;ЕҢ КӨП КІТАП ОҚИТЫН ОҚУШЫ&raquo; байқауына 2-11 қазақ сынып оқушылары қатыса алады.</p>
            <p>&nbsp;2.2. Байқау сұрақтары оқыған кітап бойынша 30 тест сұрақтан тұрады. А, В, С, Д, &nbsp;Е жауаптарының ішінде дұрыс жауап жасырынған.</p>
            <p>2.3. Жорға, Бәйге ойындары секілді әр сұраққа белгілі уақыт бекітілген. Әр сұраққа 40 секунд, 30 сұраққа жауап беру үшін барлығы 12 минут уақыт беріледі.</p>
            <p>2.4. Байқауға қатысу ерікті. Жарнасы &ndash; 1000 тг. Ата-анаң шарттарға келіскен жағдайда қатысуға болады.</p>
            <p>&nbsp;</p>
            <p>ІІІ. ҚАТЫСУ ТӘРТІБІ:</p>
            <p>3.1. <a href="http://bilimshini.kz/">http://bilimshini.kz/</a>&nbsp; сілтемесін басу арқылы сайтқа өту.</p>
            <p>(15-22 қараша &nbsp;тәулік бойы жұмыс жасайды).</p>
            <p>3.2. Марафон батырмасын басу. Толық ЕРЕЖЕМЕН танысу.</p>
            <p>3.3. Анкетаны ретімен қатесіз толтыру. (Анкетаны дұрыс толтыр.&nbsp; Диплом анкетада жазылған мәліметпен шығады)</p>
            <p>3.4. Жіберу батырмасын басу.</p>
            <p>3.5. Төлем жасау беті ашылады, кез-келген төлеу картасымен (ата-ананың рұқсатымен) төлем жасағаннан кейін Байқау тапсырмалары бірден ашылады. Сайттан шықпай, тапсырманы орындау шарт.</p>
            <p>3.6. Сайттан төлем жасау қиындық туғызған жағдайда, 8775 403 72 84 Жанна, 8775 424 37 27 Феруза &nbsp;Каспий голд номерлерінің біріне жарнаны аударып, ЖСН тіркетіп алу керек. Жарна төленгені туралы чекті және оқушы ЖСН-нін вадсап номердің біріне жазып жіберу керек.&nbsp; &laquo;Тіркелді&raquo; деген жауап келгеннен кейін сайтқа кіріп, тестті орындауға болады.</p>
            <p>3.7. Тестті&nbsp; орындау аяқталған соң, дұрыс жауаптар саны шығады.</p>
            <p>3.8. Нәтиже батырмасын басып, марапат қағаздарды бірден сақтап алу керек.</p>
            <p>3.9.&nbsp; Егер 12 минутта 30 сұраққа дұрыс жауап берсең, &laquo;ЕҢ КӨП КІТАП ОҚИТЫН ОҚУШЫ&raquo; номинациясы бойынша марапатқа ие боласың! Жеңімпаз оқушы арнайы медальмен, Дипломмен марапатталады. Сынып жетекшіңе, ата-анаңа Алғыс хат беріледі. Марапаттар түпнұсқасы жіберіледі.</p>
            <p>&nbsp;</p>
            <ol>
                <li>ОЛИМПИАДА ЖЕҢІМПАЗДАРЫН МАРАПАТТАУ</li>
            </ol>
            <p>4.1. Бас жүлде &ndash; 30 дұрыс жауап. МЕДАЛЬ + ДИПЛОМ + Жетекші мұғалімге АЛҒЫС ХАТ + Ата-анаға АЛҒЫС ХАТ</p>
            <p>4.2. І орын &ndash; 28-29 дұрыс жауап. Оқушыға І ДӘРЕЖЕЛІ ДИПЛОМ</p>
            <p>4.3. ІІ орын &ndash; 23-25 дұрыс жауап. Оқушыға ІІ ДӘРЕЖЕЛІ ДИПЛОМ</p>
            <p>4.4. ІІІ орын &ndash; 20-22&nbsp; дұрыс жауап. Оқушыға ІІІ ДӘРЕЖЕЛІ ДИПЛОМ</p>
            <p>4.5. Орын алмаған оқушыларға СЕРТИФИКАТ.</p>
            <p>&nbsp;</p>
            <p>СӘТТІЛІК ТІЛЕЙМІЗ!</p>

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