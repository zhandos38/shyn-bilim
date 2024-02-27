<?php

use common\models\City;
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
            <div class="col-md-3">
                <?= $form->field($model, 'iin') ?>
            </div>
        </div>

        <div class="row mt--40">
            <h3>Мекен жай</h3>
            <div class="col-md-3">
                <?= $form->field($model, 'region_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\common\models\Region::find()->asArray()->all(), 'id', 'name'),
                    'options' => ['placeholder' => Yii::t('app', 'Укажите регион')],
                ]); ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'city_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\common\models\City::find()->asArray()->all(), 'id', 'name'),
                    'options' => ['placeholder' => Yii::t('app', 'Укажите город')],
                ]); ?>
            </div>
        </div>
        <div class="row mt--40">
            <h3>Мектеп</h3>
            <div class="col-md-3">
                <?= $form->field($model, 'lang')->dropDownList([
                    'kz' => 'Қазақша',
                    'ru' => 'Русский',
                ]) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'teacher_name') ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'teacher_type_name')->dropdownList([
                    'Бастауыш мұғалімі' => 'Бастауыш мұғалімі',
                    'Ағылшын тілі пәні мұғалімі' => 'Ағылшын тілі пәні мұғалімі',
                    'Орыс тілі және әдебиет пәні мұғалімі' => 'Орыс пәні мұғалімі',
                    'Математика пәні мұғалімі' => 'Математика мұғалімі',
                    'Қазақ тілі мен әдебиет пәні мұғалімі' => 'Қазақ тілі мен әдебиет пәні мұғалімі',
                    'Дүниетану пәні мұғалімі' => 'Дүниетану пәні мұғалімі',
                    'Тарих пәні мұғалімі' => 'Тарих пәні мұғалімі',
                    'Жаратылыстану пәні мұғалімі' => 'Жаратылыстану пәні мұғалімі',
                    'Информатика пәні мұғалімі' => 'Информатика пәні мұғалімі',
                    'Физика пәні мұғалімі' => 'Физика пәні мұғалімі',
                    'Биология пәні мұғалімі' => 'Биология пәні мұғалімі',
                    'Химия пәні мұғалімі' => 'Химия пәні мұғалімі',
                    'География пәні мұғалімі' => 'География пәні мұғалімі',
                    'Көркем еңбек пәні мұғалімі' => 'Көркем еңбек пәні мұғалімі',
                    'Кітапханашы ' => 'Кітапханашы',
                    'Дене шынықтыру пәні мұғалімі' => 'Дене шынықтыру пәні мұғалімі',
                    'Өзбек тілі мен әдебиеті пәні мұғалімі' => 'Өзбек тілі мен әдебиеті пәні мұғалімі',
                    'Мектеп алды даярлық мұғалім' => 'Мектеп алды даярлық мұғалім',
                    'Мектеп алды даярлық тобы жетекшісі' => 'Мектеп алды даярлық тобы жетекшісі',
                ], [
                    'prompt' => Yii::t('app', 'Выберите преподавателя')
                ]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'school_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\common\models\School::find()->asArray()->all(), 'id', function ($model) {
                        return htmlspecialchars_decode($model['name']);
                    }),
                    'options' => ['placeholder' => Yii::t('app', 'Укажите школу')],
                ]); ?>
                <small class="text-secondary"><?= Yii::t('app', 'Если вы не нашли вашу школу, напишите нам bilimshini.kz@mail.ru') ?></small>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'subject_id')->dropDownList(ArrayHelper::map(Subject::findAll(['type' => Subject::TYPE_STUDENT]), 'id', 'name'), [
                    'id' => 'subject_id-select',
                    'prompt' => Yii::t('app', Yii::t('app', 'Выберите предмет'))
                ]) ?>
            </div>
            <div class="col-md-3">
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
                    11 => '11',
                ], [
                    'prompt' => Yii::t('app', 'Выберите класс')
                ]) ?>
            </div>
        </div>

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
