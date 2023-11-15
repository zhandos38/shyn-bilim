<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\widgets\MaskedInput;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['site/signup']];
$this->params['heroTitle'] = $this->title;
$this->params['heroDescription'] = 'Заполните форму чтобы зарегистрироватся:';
?>
<div class="bg-gradient-13 rbt-section-gapBottom">
    <div class="container pt--60">
        <div class="section-title text-center mb--60">
            <span class="subtitle bg-secondary-opacity">Регистрация</span>
            <h2 class="title">Тіркелу</h2>
        </div>
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

        <div>
            <h3>Жеке ақпарат</h3>
            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'surname') ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'patronymic') ?>
                </div>
            </div>
        </div>

        <div>
            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'phone')->widget(MaskedInput::className(), [
                        'mask' => '+7(999)999-99-99',
                        'clientOptions' => [
                            'removeMaskOnSubmit' => true
                        ],
                    ]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'password')->passwordInput() ?>
                </div>
            </div>
        </div>

        <div class="mt--40">
            <h3>Мекен жай</h3>
            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'region_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\common\models\Region::find()->asArray()->all(), 'id', 'name'),
                    'options' => ['placeholder' => Yii::t('app', 'Укажите регион')],
                ]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'city_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\common\models\City::find()->asArray()->all(), 'id', 'name'),
                    'options' => ['placeholder' => Yii::t('app', 'Укажите город')],
                ]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'address') ?>
                </div>
            </div>
        </div>
        <div class="mt--40">
            <h3>Мектеп</h3>
            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'school_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\common\models\School::find()->asArray()->all(), 'id', 'name'),
                    'options' => ['placeholder' => Yii::t('app', 'Укажите школу')],
                ]) ?>
                <small class="text-secondary"><?= Yii::t('app', 'Если вы не нашли вашу школу, напишите нам bilimshini.kz@mail.ru') ?></small>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'role')->dropDownList([
                        \common\models\User::ROLE_STUDENT => 'Оқушы',
                        \common\models\User::ROLE_TEACHER => 'Оқытушы',
                    ], [
                        'id' => 'role-select',
                        'prompt' => 'Оқушы/Оқытушы таңдау'
                    ]) ?>
                </div>
                <div id="grade-wrapper" class="col-md-3" style="display: none">
                    <?= $form->field($model, 'grade')->dropDownList([
                        1,
                        2,
                        3,
                        4,
                        5,
                        6,
                        7,
                        8,
                        9,
                        10,
                        11,
                    ], [
                        'id' => 'grade-select',
                        'prompt' => Yii::t('app', 'Выберите класс')
                    ]) ?>
                </div>
                <div id="teacher_title-wrapper" class="col-md-3" style="display: none">
                    <?= $form->field($model, 'teacher_title')->dropdownList([
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
                    ], [
                        'id' => 'teacher_title-select',
                        'prompt' => Yii::t('app', 'Выберите преподавателя')
                    ]) ?>
                </div>
            </div>
        </div>

         <div class="form-group mt-4">
            <?= Html::submitButton(Yii::t('app', 'Продолжить'), ['class' => 'rbt-btn btn-gradient w-100', 'name' => 'signup-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php
$teacher = \common\models\User::ROLE_TEACHER;
$student = \common\models\User::ROLE_STUDENT;
$js =<<<JS
const teacher = "$teacher"
const student = "$student"
$('#signupform-region_id').change(function() {
  $.get({
    url: '/kz/site/get-cities',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#signupform-city_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});

$('#signupform-city_id').change(function() {
  $.get({
    url: '/kz/site/get-schools',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#signupform-school_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});


$('#role-select').change(function() {
    $('#teacher_title-wrapper').hide('ease');
    $('#grade-wrapper').hide('ease');
    if ($(this).val() === teacher) {
        $('#teacher_title-wrapper').show('ease');
    } else {
        $('#grade-wrapper').show('ease');
    }
});
JS;


$this->registerJs($js);
?>
