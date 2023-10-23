<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageFile')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ]) ?>

    <?php if ($model->img): ?>
        <img src="<?= $model->getImage() ?>" alt="product-image" width="200px">
    <?php endif; ?>

    <?= $form->field($model, 'fileTemp')->widget(FileInput::classname(), [
        'options' => ['accept' => 'document/*'],
    ]) ?>

    <?= $form->field($model, 'age_range')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'book_category_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(\common\models\BookCategory::find()->all(), 'id', 'name'),
        [
            'prompt' => 'Выбрать категорию'
        ]
    ) ?>

    <div class="form-group mt-2">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
