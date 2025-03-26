<?php

use common\models\Subject;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Test;

/* @var $this yii\web\View */
/* @var $model common\models\TestAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="test-assignment-form">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_SUCCESS,
        'isSolid' => true,
        'boxTools' => Html::a('Назад <i class="fas fa-arrow-alt-circle-left"></i>', ['index'], ['class' => 'btn btn-danger btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' =>  $this->title
    ]) ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'iin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'leader_name') ?>

    <?= $form->field($model, 'leader_phone')->textInput(['placeholder' => '7771112233', 'maxlength' => 10]) ?>

    <?= $form->field($model, 'parent_name') ?>

    <?= $form->field($model, 'parent_phone')->textInput(['placeholder' => '7771112233', 'maxlength' => 10]) ?>

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

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php LteBox::end() ?>

</div>
<?php
$js =<<<JS
$('#bookassignment-region_id').change(function() {
  $.get({
    url: '/test-assignment/get-cities',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#bookassignment-city_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});

$('#bookassignment-city_id').change(function() {
  $.get({
    url: '/test-assignment/get-schools',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#bookassignment-school_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});
JS;


$this->registerJs($js);
?>
