<?php

use common\models\City;
use common\models\Region;
use common\models\School;
use kartik\select2\Select2;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\MaskedInput;

$this->title = 'Марафон';
$this->params['heroTitle'] = $this->title;
$this->params['heroDescription'] = 'КАНИКУЛДА КІТАП ОҚИМЫЗ';

/** @var $model \yii\rbac\Assignment  */
/** @var $checkAssignmentForm \frontend\models\CheckAssignmentForm  */
?>
<div class="bg-gradient-13 pt--60 pb--60">
    <div class="container">
        <h1>
            <?= $this->params['heroDescription'] ?>
        </h1>
        <p>
            Марафонға қатысу үшін анкетаны толтыру қажет
        </p>

        <a id="check-assignment-btn" class="rbt-btn-link mb--30" style="cursor: pointer; color: red">
            <i class="fa fa-info"></i>  КІТАП/СЕРТИФИКАТ/АЛҒЫС ХАТ жүктей алмасаңыз осы батырманы басыңыз
        </a>

        <div id="check-assignment-form" class="mb-5" style="display: none">
            <?php $form = ActiveForm::begin(['action' => ['marathon/check-assignment']]) ?>

            <?= $form->field($checkAssignmentForm, 'iin') ?>

            <?= Html::submitButton('ЖҮКТЕУ', ['class' => 'rbt-btn']) ?>

            <?php ActiveForm::end() ?>
        </div>

        <?php $form = ActiveForm::begin() ?>
        <div class="row mt-4">
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
                    'data' => ArrayHelper::map(Region::find()->asArray()->all(), 'id', 'name'),
                    'options' => ['placeholder' => Yii::t('app', 'Укажите регион')],
                ]); ?>
                <?= $form->field($model, 'city_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name'),
                    'options' => ['placeholder' => Yii::t('app', 'Укажите город')],
                ]); ?>

                <?= $form->field($model, 'school_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(School::find()->asArray()->all(), 'id', function ($model) {
                        return htmlspecialchars_decode($model['name']);
                    }),
                    'options' => ['placeholder' => Yii::t('app', 'Укажите школу')],
                ]); ?>
                <small class="text-secondary">
                    Мектеп тізімнен табылмаған жағдайда <a href="teL:+7(775)4037284">+7(775) 403-72-84</a>, <a href="teL:+7(775)4243727">+7(775) 424-37-27</a> ватсапқа жазыңыз
                </small>
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
                <?= Html::submitButton(Yii::t('app', 'Перейти к книгам'), ['class' => 'rbt-btn']) ?>
            </div>
        </div>
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
