<?php

use common\models\ArticleMagazine;
use common\models\Subject;
use frontend\models\CheckArticleForm;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\ArrayHelper;
use yii\web\View;

/* @var $this View */
/* @var $model CheckArticleForm */

$this->title = Yii::t('app', 'Получить сертификат');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Вопросы и ответы'), 'url' => ['site/questions']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => '#'];
?>
<div class="container pt--60 pb--60">
    <h1 class="mb-4">
        <?= $this->title ?>
    </h1>

    <?php $form = ActiveForm::begin() ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'iin') ?>

            <?= $form->field($model, 'subject_id')->dropDownList(ArrayHelper::map(Subject::findAll(['type' => Subject::TYPE_ARTICLE]), 'id', 'name'), [
                'id' => 'subject_id-select',
                'prompt' => Yii::t('app', 'Выберите предмет')
            ]) ?>

            <?= $form->field($model, 'article_magazine_id')->dropDownList(ArrayHelper::map(ArticleMagazine::find()->all(), 'id', 'name'), [
                'prompt' => 'Выбрать журнал'
            ])->label('Журнал') ?>

            <?= Html::submitButton(Yii::t('app', 'Отправить'), ['class' => 'rbt-btn']) ?>
        </div>
    </div>

    <?php ActiveForm::end() ?>
</div>
