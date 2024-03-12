<?php

use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleMagazine */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="magazine-form">

    <?php

    LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools' => Html::a('Назад <i class="fas fa-arrow-alt-circle-left"></i>', ['index'], ['class' => 'btn btn-danger btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' =>  $this->title
    ])

    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'imgFile')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ]) ?>

    <?php if ($model->img): ?>
        <img src="<?= $model->getImage() ?>" alt="product-image" width="200px">
    <?php endif; ?>

    <div class="form-group mt-4">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php LteBox::end() ?>

</div>
