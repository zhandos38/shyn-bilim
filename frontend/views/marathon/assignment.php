<?php

use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\MaskedInput;

$this->title = 'Марафон';
$this->params['heroTitle'] = $this->title;
$this->params['heroDescription'] = 'КАНИКУЛДА КІТАП ОҚИМЫЗ';

/** @var $checkAssignmentForm \frontend\models\CheckAssignmentForm  */
?>
<div class="row justify-content-center">
    <div class="col-md-4 text-center">
        <h4>
         <?= $this->params['heroDescription'] ?>
        </h4>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div>
            <div>
                <a id="check-assignment-btn" href="/file/marathon-2022/rule.pdf">
                    <button class="btn btn-info">
                        <i class="fa fa-info"></i> Бекітілген ереженмен танысу
                    </button>
                </a>
            </div>
            
            <div>
                <button id="try-example-btn" class="btn btn-info">
                    <i class="fa fa-eye"></i> Мысал тапсырмалармен танысу
                </button>
                <div id="try-example-box" style="display: none">
                    <ol>
                        <li><a href="/file/marathon/2,3,4-grade.pdf">2,3,4 сынып</a></li>
                        <li><a href="/file/marathon/5,6-grade.pdf">5,6 сынып</a></li>
                        <li><a href="/file/marathon/7,8-grade.pdf">7,8 сынып</a></li>
                        <li><a href="/file/marathon/9,10,11-grade.pdf">9,10,11 сынып</a></li>
                    </ol>
                </div>
            </div>
            
            <div>
                <button id="check-assignment-btn btn btn-info" href="javaScript:void(0);">
                    <i class="fa fa-info"></i> <?= Yii::t('app', 'Вы уже заполняли анкету?') ?>
                </button>
                
                <div id="check-assignment-form" class="mb-5" style="display: none">
                    <?php $form = ActiveForm::begin(['action' => ['marathon/check-assignment']]) ?>

                    <?= $form->field($checkAssignmentForm, 'iin') ?>

                    <?= \yii\bootstrap4\Html::submitButton(Yii::t('app', 'Перейти к книгам'), ['class' => 'btn btn-success']) ?>

                    <?php ActiveForm::end() ?>
                </div>
            </div>
        </div>

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
        <small class="text-secondary"><?= Yii::t('app', 'Если вы не нашли вашу школу, напишите нам +7(701) 312 99 06 (Whatsapp)') ?></small>

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
            'prompt' => Yii::t('app', 'Выберите класс')
        ]) ?>

        <?= $form->field($model, 'phone')->widget(MaskedInput::className(), [
            'mask' => '+7(999)999-99-99',
            'clientOptions' => [
                'removeMaskOnSubmit' => true
            ],
            'options' => [
                'placeholder' => '7(000) 000-00-00'
            ]
        ]) ?>

        <?= $form->field($model, 'phone_teacher')->widget(MaskedInput::className(), [
            'mask' => '+7(999)999-99-99',
            'clientOptions' => [
                'removeMaskOnSubmit' => true
            ],
            'options' => [
                'placeholder' => '7(000) 000-00-00'
            ]
        ]) ?>

        <?= $form->field($model, 'parent_name') ?>

        <?= $form->field($model, 'phone_parent')->widget(MaskedInput::className(), [
            'mask' => '+7(999)999-99-99',
            'clientOptions' => [
                'removeMaskOnSubmit' => true
            ],
            'options' => [
                'placeholder' => '7(000) 000-00-00'
            ]
        ]) ?>

        <?= \yii\bootstrap4\Html::submitButton(Yii::t('app', 'Перейти к книгам'), ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end() ?>
    </div>
</div>
<?php
$js =<<<JS
$('#marathon-region_id').change(function() {
  $.get({
    url: '/kz/site/get-cities',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#marathon-city_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});

$('#marathon-city_id').change(function() {
  $.get({
    url: '/kz/site/get-schools',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#marathon-school_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});

$('#toggleBtn').click(function() {
  $('#toggleText').toggle('ease');
});
            
$('#try-example-btn').click(function() {
  $('#try-example-box').toggle('ease');
});

$('#check-assignment-btn').click(function() {
  $('#check-assignment-form').toggle('ease');
});
JS;


$this->registerJs($js);
?>
