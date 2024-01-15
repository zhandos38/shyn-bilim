<?php

use common\models\User;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput() ?>

        <?= $form->field($model, 'surname')->textInput() ?>

        <?= $form->field($model, 'patronymic')->textInput() ?>

        <?= $form->field($model, 'iin')->textInput() ?>

        <?= $form->field($model, 'phone')->textInput() ?>

        <?= $form->field($model, 'grade')->dropDownList([
                '1' => 1,
                                                    '2' => 2,
                                                    '3' => 3,
                                                    '4' => 4,
                                                    '5' => 5,
                                                    '6' => 6,
                                                    '7' => 7,
                                                    '8' => 8,
                                                    '9' => 9,
                                                    '10' => 10,
                                                    '11' => 11,
            ], [
                'id' => 'grade-select',
                'prompt' => Yii::t('app', 'Выберите класс')
            ]) ?>

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
        'Мектеп алды даярлық тобы жетекшісі' => 'Мектеп алды даярлық тобы жетекшісі',
    ], [
        'id' => 'teacher_title-select',
        'prompt' => Yii::t('app', 'Выберите преподавателя')
    ]) ?>

        <?= $form->field($model, 'role')->dropDownList(User::getRoles(), ['prompt' => 'Указать роль']) ?>

        <?= $form->field($model, 'status')->dropDownList(User::getStatuses(), ['prompt' => 'Указать статус']) ?>

        <?= $form->field($model, 'article_count') ?>

        <?= $form->field($model, 'subscribe_until') ?>

        <div class="form-group mt-2">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

</div>
