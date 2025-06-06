<?php

use common\models\City;
use common\models\Olympiad;
use common\models\Region;
use common\models\School;
use common\models\Subject;
use kartik\select2\Select2;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\MaskedInput;

/* @var $this \yii\web\View */
/* @var $model \common\models\BookAssignment */

$this->title = Yii::t('app', 'Регистрация');

$this->params['heroTitle'] = $this->title;
$this->params['heroDescription'] = 'БІЛІМ ШЫҢЫ - ҒЫЛЫМ СЫРЫ';
?>
<div class="bg-gradient-13 pt--60 pb--60">
    <div class="container">
       
        <?php $form = ActiveForm::begin() ?>

        <div class="row">
            <h3>Жеке ақпарат</h3>
            <div class="col-md-3">
                <?= $form->field($model, 'surname') ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'name') ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'patronymic') ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'iin') ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'grade')->dropDownList([
                    '1_grade' => '1 класс',
                    '2_grade' => '2 класс',
                    '3_grade' => '3 класс',
                    '4_grade' => '4 класс',
                    '5_grade' => '5 класс',
                    '6_grade' => '6 класс',
                    '7_grade' => '7 класс',
                    '8_grade' => '8 класс',
                    '9_grade' => '9 класс',
                    '10_grade' => '10 класс',
                    '11_grade' => '11 класс',
                    '1_course' => '1 курс',
                    '2_course' => '2 курс',
                    '3_course' => '3 курс',
                    '4_course' => '4 курс',
                ]) ?>
            </div>
        </div>

        <div class="row mt--40">
            <h3>Мектеп</h3>
            <div class="col-md-3">
                <?= $form->field($model, 'region_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Region::find()->asArray()->all(), 'id', 'name'),
                    'options' => ['id' => 'region_id', 'placeholder' => Yii::t('app', 'Укажите регион')],
                ]); ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'city_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name'),
                    'options' => ['id' => 'city_id', 'placeholder' => Yii::t('app', 'Укажите город')],
                ]); ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'school_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(School::find()->asArray()->all(), 'id', function ($model) {
                        return htmlspecialchars_decode($model['name']);
                    }),
                    'options' => ['id' => 'school_id', 'placeholder' => Yii::t('app', 'Укажите школу')],
                ]); ?>
                <small class="text-secondary"><?= Yii::t('app', 'Если вы не нашли вашу школу, напишите нам bilimshini.kz@mail.ru') ?></small>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'leader_name') ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'leader_phone')->widget(MaskedInput::className(), [
                    'mask' => '+7(999)999-99-99',
                    'clientOptions' => [
                        'removeMaskOnSubmit' => true
                    ],
                ]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'parent_name') ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'parent_phone')->widget(MaskedInput::className(), [
                    'mask' => '+7(999)999-99-99',
                    'clientOptions' => [
                        'removeMaskOnSubmit' => true
                    ],
                ]) ?>
            </div>
        </div>

        <div class="mt--40">
            <?= Html::submitButton('Кітап жүктеу', ['class' => 'rbt-btn btn-gradient']) ?>
        </div>
    </div>
</div>


<?php ActiveForm::end() ?>
<?php
$bastaushLabel = Yii::t('site', 'Преподаватель начальных классов');
$historyLabel = Yii::t('site', 'Преподаватель истории');
$geographyLabel = Yii::t('site', 'Преподаватель географии');
$naturalSciencesLabel = Yii::t('site', 'Преподаватель по естествознанию');
$js =<<<JS
let bastaushLabel = "$bastaushLabel";
let historyLabel = "$historyLabel";
let geographyLabel = "$geographyLabel";
let naturalSciencesLabel = "$naturalSciencesLabel";
$('#region_id').change(function() {
  $.get({
    url: '/kz/site/get-cities',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#city_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});

$('#city_id').change(function() {
  $.get({
    url: '/kz/site/get-schools',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#school_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});

$('#grade-select').change(function() {
  $.get({
    url: '/kz/site/get-subjects',
    data: {grade: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name_kz + '</option>'; 
      });
      
      $('#subject_id-select').html(options);
      $('#subject_id-wrapper').show();
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

$(document).ready(() => {
    handleChange();
    
    if (parseInt($('#grade-select').val())) {
        $('#subject_id-wrapper').show();
    }
});

$('#grade-input').change(function() {
    handleChange();
});

function handleChange() {
  let firstLabel = $('#leader-name-input').siblings('label');
    let secondLabel = $('#leader-name-second-input').siblings('label');

    let grade = parseInt($('#grade-input').val());
    
    if (grade <= 4) {
        firstLabel.html(bastaushLabel);
    } else if (grade >= 5 && grade <= 6) {
        firstLabel.html(historyLabel);
        secondLabel.html(naturalSciencesLabel);
    } else if (grade > 6) {
        firstLabel.html(historyLabel);
        secondLabel.html(geographyLabel);
    }
    
    if (grade) {
          $('#leader-name-input-box').show();
      } 
    
  if (grade >= 5) {
      $('#leader-name-second-input-box').show();
  } else {
      $('#leader-name-second-input-box').hide();
  }
}
JS;


$this->registerJs($js);
?>
