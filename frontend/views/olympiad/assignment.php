<?php

use common\models\School;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this \yii\web\View */
/* @var $model \common\models\TestAssignment */
/* @var $test \common\models\Test */

$this->title = Yii::t('app', 'Регистрация');

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Олимпиады'), 'url' => ['olympiad/index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['olympiad/assignment', 'test' => $test->id]];
?>
<h1><?= $test->name ?></h1>
<p>
    <?= Yii::t('app', 'Заполните форму для участия в данной олимпиаде. Стоимость составляет {tenge} тенге', ['tenge' => $test->olympiad->price]) ?>
    <?php if (Yii::$app->language === 'ru'): ?>
        Отправляя данные вы соглашаетесь с условиями <a style="color: red" href="<?= '/file/offer.pdf' ?>" target="_blank">публичной оферты</a>
    <?php else: ?>
        Мәліметтерді жібере отырып, <a style="color: red" href="<?= '/file/offer.pdf' ?>" target="_blank">қоғамдық ұсыныспен</a> келісесіз
    <?php endif; ?>
</p>
<div class="row">
    <div class="col-md-4">
        <?php $form = ActiveForm::begin() ?>

        <?= $form->field($model, 'surname') ?>

        <?= $form->field($model, 'name') ?>

        <?= $form->field($model, 'patronymic') ?>

        <?= $form->field($model, 'iin') ?>

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

        <?php if ($test->olympiad->type === \common\models\Olympiad::TYPE_STUDENT): ?>

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
                11 => '11'
            ],[
                'prompt' => Yii::t('app', 'Выберите класс')
            ]) ?>

        <?php endif; ?>

        <?= $form->field($model, 'lang')->dropDownList([
            'kz' => 'Қазақша',
            'ru' => 'Русский'
        ], [
            'prompt' => Yii::t('app', 'Выберите язык')
        ]) ?>

        <p>
            <small><?= Yii::t('app', 'Видеоинструкция как оплатить') ?>: <a href="https://youtu.be/Ej3I7IEomxc">https://youtu.be/Ej3I7IEomxc</a></small>
        </p>
        <p>
            <small><?= Yii::t('app', 'Видеоинструкция "Как откырть доступ к онлайн оплатам в Kaspi Gold"') ?>: <a href="https://youtu.be/dVm6dYWOhD8">https://youtu.be/dVm6dYWOhD8</a></small>
        </p>

        <?= \yii\bootstrap4\Html::submitButton(Yii::t('app', 'Отправить'), ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end() ?>
    </div>
</div>
<?php
$js =<<<JS
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
JS;


$this->registerJs($js);
?>