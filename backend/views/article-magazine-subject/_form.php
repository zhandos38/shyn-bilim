<?php

use common\models\ArticleMagazine;
use common\models\Subject;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleMagazineSubject */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-magazine-subject-form">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools' => Html::a('Назад <i class="fas fa-arrow-alt-circle-left"></i>', ['index'], ['class' => 'btn btn-danger btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' =>  $this->title
    ]) ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'article_magazine_id')->dropDownList(ArrayHelper::map(ArticleMagazine::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'subject_id')->dropDownList(ArrayHelper::map(Subject::find()->where(['type' => Subject::TYPE_ARTICLE])->all(), 'id', 'name_kz')) ?>

    <div class="form-group mt-4">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php LteBox::end() ?>

</div>
