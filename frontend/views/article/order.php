<?php
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this \yii\web\View */
/* @var $model \common\models\Article */

$this->title = Yii::t('app', 'Опубликовать материал');
?>
<div class="container rbt-section-gapTop rbt-section-gapBottom">
    <div class="order-form">
        <h1><?= $this->title ?></h1>
        <div class="row">
            <div class="col-md-6">
                <?php $form = ActiveForm::begin() ?>

                <?= $form->field($model, 'iin') ?>

                <?= $form->field($model, 'topic') ?>

                <?= $form->field($model, 'subject_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\common\models\Subject::find()->andWhere(['type' => \common\models\Subject::TYPE_ARTICLE])->asArray()->all(), 'id', Yii::$app->language === 'ru' ? 'name_ru' : 'name_kz'),
                    'options' => ['placeholder' => Yii::t('app', 'Укажите предмет')],
                ]) ?>

                <?= $form->field($model, 'fileTemp')->widget(FileInput::classname(), [
                    'options' => [
                        'accept' => 'document/*'
                    ],
                    'pluginOptions' => [
                        'theme' => 'fa',
                        'showCaption' => false,
                        'showUpload' => false,
                        'browseLabel' =>  Yii::t('app', 'Загрузить')
                    ],
                ]) ?>
            </div>
        </div>

        <?= \yii\bootstrap5\Html::submitButton(Yii::t('app', 'Сохранить/Оплатить'), ['class' => 'rbt-btn']) ?>

        <?php ActiveForm::end() ?>

    </div>
</div>
<?php
$js =<<<JS
$('#article-region_id').change(function() {
  $.get({
    url: '/kz/site/get-cities',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#article-city_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});

$('#article-city_id').change(function() {
  $.get({
    url: '/kz/site/get-schools',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#article-school_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});
JS;


$this->registerJs($js);
?>
