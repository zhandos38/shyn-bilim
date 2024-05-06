<?php

use common\models\Article;
use common\models\ArticleMagazine;
use common\models\City;
use common\models\Region;
use common\models\School;
use common\models\Subject;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProjectArticle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-article-form">

    <?php

    LteBox::begin([
        'type' => LteConst::TYPE_SUCCESS,
        'isSolid' => true,
        'boxTools' => Html::a('Назад <i class="fas fa-arrow-alt-circle-left"></i>', ['index'], ['class' => 'btn btn-danger btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' =>  $this->title
    ])

    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'article_magazine_id')->dropDownList(ArrayHelper::map(ArticleMagazine::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'iin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'topic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(Article::getStatuses()) ?>

    <?= $form->field($model, 'lead_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grade')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'fileTemp')->widget(FileInput::classname(), [
        'options' => ['accept' => 'document/*'],
    ]) ?>

    <?= $form->field($model, 'subject_id')->dropDownList(ArrayHelper::map(Subject::find()->andWhere(['type' => Subject::TYPE_ARTICLE])->asArray()->all(), 'id', 'name_ru'), ['prompt' => 'Выберите предмет']) ?>

    <?= $form->field($model, 'region_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Region::find()->asArray()->all(), 'id', 'name'),
        'options' => ['id' => 'region_id', 'placeholder' => Yii::t('app', 'Укажите регион')],
    ]); ?>

    <?= $form->field($model, 'city_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name'),
        'options' => ['id' => 'city_id', 'placeholder' => Yii::t('app', 'Укажите город')],
    ]); ?>

    <?= $form->field($model, 'school_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(School::find()->asArray()->all(), 'id', function ($model) {
            return htmlspecialchars_decode($model['name']);
        }),
        'options' => ['id' => 'school_id', 'placeholder' => Yii::t('app', 'Укажите школу')],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$js =<<<JS
$('#region_id').change(function() {
  $.get({
    url: '/test-assignment/get-cities',
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
    url: '/test-assignment/get-schools',
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
JS;

$this->registerJs($js);

?>