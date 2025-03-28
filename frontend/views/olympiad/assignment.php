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
/* @var $model \common\models\TestAssignment */
/* @var $olympiad \common\models\Olympiad */

$this->title = Yii::t('app', 'Регистрация');

$this->params['heroTitle'] = $this->title;
$this->params['heroDescription'] = 'БІЛІМ ШЫҢЫ - ҒЫЛЫМ СЫРЫ';
?>
<div class="bg-gradient-13 pt--60 pb--60">
    <div class="container">
        <h1><?= $olympiad->name ?></h1>
        <p>
            Олимпиадаға қатысу үшін анкетаны толтыру қажет
        </p>
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
        </div>

        <div class="row">
            <div class="col-md-3">
                <?= $form->field($model, 'lang')->dropDownList([
                    'KZ' => 'Қазақша',
                    'RU' => 'Русский',
                ]) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'phone')->widget(MaskedInput::className(), [
                    'mask' => '+7(999)999-99-99',
                    'clientOptions' => [
                        'removeMaskOnSubmit' => true
                    ],
                ]) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'iin') ?>
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
        <?php if ($olympiad->type === Olympiad::TYPE_STUDENT): ?>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'leader_phone')->widget(MaskedInput::className(), [
                    'mask' => '+7(999)999-99-99',
                    'clientOptions' => [
                        'removeMaskOnSubmit' => true
                    ],
                ]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'teacher_name') ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'parent_name') ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'parent_name_second') ?>
            </div>
            <div class="col-md-1">
                <?= $form->field($model, 'grade')->dropDownList([
                    1 => '1',
                    2 => '2',
                    3 => '3',
                    4 => '4',
                    5 => '5',
                    6 => '6',
                    7 => '7',
                    8 => '8',
                    9 => '9',
                    10 => '10',
                    11 => '11',
                ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <?= $form->field($model, 'subject_id')->dropDownList(ArrayHelper::map(Subject::findAll(['type' => Subject::TYPE_STUDENT]), 'id', 'name_kz'), ['prompt' => 'Пән таңдау']) ?>
            </div>
        </div>
        <?php else: ?>
            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'subject_id')->dropDownList(ArrayHelper::map(Subject::findAll(['type' => Subject::TYPE_TEACHER]), 'id', 'name_kz'), ['prompt' => 'Пән таңдау']) ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="mt--40">
            <?= Html::submitButton('Олимпиада бастау', ['class' => 'rbt-btn btn-gradient']) ?>
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
