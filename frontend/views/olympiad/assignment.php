<?php

use common\models\School;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\MaskedInput;

/* @var $this \yii\web\View */
/* @var $model \common\models\TestAssignment */
/* @var $olympiad \common\models\Olympiad */

$this->title = Yii::t('app', 'Регистрация');

$this->params['heroTitle'] = $this->title;
$this->params['heroDescription'] = 'БІЛІМ ШЫҢЫ - ҒЫЛЫМ СЫРЫ';
?>
<h1><?= $olympiad->name ?></h1>
<p>
    <?= Yii::t('app', 'Заполните форму для участия в данной олимпиаде. Стоимость составляет {tenge} тенге', ['tenge' => $olympiad->price]) ?>
    <?php if (Yii::$app->language === 'ru'): ?>
        Отправляя данные вы соглашаетесь с условиями <a style="color: red" href="<?= '/file/offer.pdf' ?>" target="_blank">публичной оферты</a>
    <?php else: ?>
        Мәліметтерді жібере отырып, <a style="color: red" href="<?= '/file/offer.pdf' ?>" target="_blank">қоғамдық ұсыныспен</a> келісесіз
    <?php endif; ?>
</p>
<?php $form = ActiveForm::begin() ?>

<div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'surname') ?>

        <?= $form->field($model, 'name') ?>

        <?= $form->field($model, 'patronymic') ?>

        <?= $form->field($model, 'iin') ?>
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
            'id' => 'grade-select',
            'prompt' => Yii::t('app', 'Выберите класс')
        ]) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'phone')->widget(MaskedInput::className(), [
            'mask' => '+7(999)999-99-99',
            'clientOptions' => [
                'removeMaskOnSubmit' => true,
            ],
            'options' => ['placeholder' => '+7(___)___-__-__'],
        ])->label('Мұғалім ватсап номері') ?>

        <?= $form->field($model, 'teacher_name') ?>

        <?= $form->field($model, 'teacher_type_name')->dropdownList([
            'Бастауыш пәні мұғалімі' => 'Бастауыш пәні мұғалімі',
            'Ағылшын тілі пәні мұғалімі' => 'Ағылшын тілі пәні мұғалімі',
            'Орыс тілі пәні мұғалімі' => 'Орыс пәні мұғалімі',
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
        ], [
            'prompt' => Yii::t('app', 'Выберите преподавателя')
        ]) ?>

        <?= $form->field($model, 'parent_name') ?>

        <?= $form->field($model, 'lang')->dropDownList([
            'kz' => 'Қазақша',
            'ru' => 'Русский'
        ], [
            'prompt' => Yii::t('app', 'Выберите язык')
        ]) ?>
    </div>
</div>

<?= \yii\bootstrap4\Html::submitButton(Yii::t('app', 'Отправить'), ['class' => 'btn btn-success']) ?>

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
