<?php
use kartik\file\FileInput;
use kartik\select2\Select2;
use vova07\imperavi\Widget;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $model \common\models\Article */

$this->title = Yii::t('app', 'Опубликовать материал');
?>
<div class="order-form">
    <h1><?= $this->title ?></h1>
    <?php if (!$model->user_id): ?>
    <p>
        <?= Yii::t('app', 'Чтобы опубликовать материал, необходимо заполнить форму. Стоимость 3000 тенге') ?>.
        <?php if (Yii::$app->language === 'ru'): ?>
            Отправляя данные вы соглашаетесь с условиями <a style="color: red" href="<?= '/file/offer.pdf' ?>" target="_blank">публичной оферты</a>
        <?php else: ?>
            Мәліметтерді жібере отырып, <a style="color: red" href="<?= '/file/offer.pdf' ?>" target="_blank">келісімді</a> мақұлдайсыз
        <?php endif; ?>
    </p>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin() ?>

            <?= $form->field($model, 'surname') ?>

            <?= $form->field($model, 'name') ?>

            <?= $form->field($model, 'patronymic') ?>

            <?= $form->field($model, 'iin') ?>

            <?= $form->field($model, 'topic') ?>

            <?= $form->field($model, 'subject_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\common\models\Subject::find()->asArray()->all(), 'id', Yii::$app->language === 'ru' ? 'name_ru' : 'name_kz'),
                'options' => ['placeholder' => Yii::t('app', 'Укажите предмет')],
            ]) ?>

            <?= $form->field($model, 'region_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\common\models\Region::find()->asArray()->all(), 'id', 'name'),
                'options' => ['placeholder' => Yii::t('app', 'Укажите регион')],
            ]) ?>

            <?= $form->field($model, 'city_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\common\models\City::find()->asArray()->all(), 'id', 'name'),
                'options' => ['placeholder' => Yii::t('app', 'Укажите город')],
            ]) ?>

            <?= $form->field($model, 'school_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\common\models\School::find()->asArray()->all(), 'id', 'name'),
                'options' => ['placeholder' => Yii::t('app', 'Укажите школу')],
            ]) ?>

        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'content')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'minHeight' => 200,
                    'plugins' => [
                        'fullscreen',
                    ],
                ],
            ]); ?>
        </div>
    </div>

    <?= \yii\bootstrap4\Html::submitButton(Yii::t('app', 'Сохранить/Оплатить'), ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end() ?>

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