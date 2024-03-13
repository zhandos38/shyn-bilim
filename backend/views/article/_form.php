<?php

use common\models\Article;
use common\models\ArticleMagazine;
use common\models\School;
use common\models\Subject;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use kartik\file\FileInput;
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

    <?= $form->field($model, 'school_id')->dropDownList(ArrayHelper::map(School::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Выберите город']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
