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
<div class="row justify-content-center">
    <div class="col-md-12 text-center">
        <div style="background-image: linear-gradient(rgba(0, 0, 0, 0.4),rgba(0, 0, 0, 0.4)) , url(/img/marathon-2022/marathon-books.webp);
    padding: 60px 0;
    font-size: 32px;
    color: #fff;
    font-weight: 700;">
            <div>
                <?= $this->params['heroDescription'] ?>
            </div>
            <div>
                <div style="
                font-size: 20px;
                font-weight: 500;
            ">II республикалық олимпиада
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-4">
        <a class="w-100" href="/file/marathon-2022/rule.pdf">
            <button class="btn btn-success w-100">
                <i class="fa fa-info"></i> Бекітілген ереженмен танысу
            </button>
        </a>
    </div>
    
    <div class="col-md-4">
        <button id="try-example-btn" class="btn btn-success w-100">
            <i class="fa fa-eye"></i> Мысал тапсырмалармен танысу
        </button>
        <div id="try-example-box" style="display: none">
            <ol>
                <li><a href="/file/marathon/2,3,4-grade.pdf">2,3,4 сынып</a></li>
                <li><a href="/file/marathon/5,6-grade.pdf">5,6 сынып</a></li>
                <li><a href="/file/marathon/7,8-grade.pdf">7,8 сынып</a></li>
                <li><a href="/file/marathon/9,10,11-grade.pdf">9,10,11 сынып</a></li>
            </ol>
        </div>
    </div>
    
    <div class="col-md-4">
        <button id="monitoring-btn" class="btn btn-success w-100"><i class="fa fa-bar-chart"></i> Марафон "КАНИКУЛДА КІТАП ОҚИМЫЗ" 2021 нәтижелері</button>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-12 text-center">
        <div id="monitoring-box" style="display: none;">
            <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
        </div>
    </div>
</div>

<button id="check-assignment-btn" class="btn btn-danger w-100">
    <i class="fa fa-info"></i>  КІТАП/СЕРТИФИКАТ/АЛҒЫС ХАТ жүктей алмасаңыз осы қызыл батырманы басыңыз
</button>

<div id="check-assignment-form" class="mb-5" style="display: none">
    <?php $form = ActiveForm::begin(['action' => ['marathon/check-assignment']]) ?>

    <?= $form->field($checkAssignmentForm, 'iin') ?>

    <?= \yii\bootstrap4\Html::submitButton(Yii::t('app', 'Перейти к книгам'), ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end() ?>
</div>

<?php $form = ActiveForm::begin() ?>
<div class="row mt-4">
    <div class="col-md-12 text-center">
        <p>Марафонға қатысу үшін анкетаны толтырыңыз</p>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'surname') ?>

        <?= $form->field($model, 'name') ?>

        <?= $form->field($model, 'patronymic') ?>

        <?= $form->field($model, 'iin') ?>

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
    </div>
    <div class="col-md-4">
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
    </div>
    <div class="col-md-4">
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
    </div>
        <div class="col-md-12">
            <?= \yii\bootstrap4\Html::submitButton(Yii::t('app', 'Перейти к книгам'), ['class' => 'btn btn-success w-100']) ?>
        </div>
    </div>
</div>

<?php ActiveForm::end() ?>
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
            
$('#try-example-btn').click(function() {
  $('#try-example-box').toggle('ease');
});

$('#check-assignment-btn').click(function() {
  $('#check-assignment-form').toggle('ease');
});

$('#monitoring-btn').click(function() {
  $('#monitoring-box').toggle('ease');
});

var xValues = ["Түркістан облысы", "Шымкент қаласы", "Басқа аймақтар"];
var yValues = [1627, 1017, 811];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: 'Марафон "КАНИКУЛДА КІТАП ОҚИМЫЗ" 2021 нәтижелері',
    }
  }
});
JS;


$this->registerJs($js);
$this->registerJsFile("https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js", ['position' => \yii\web\View::POS_END]);
?>
