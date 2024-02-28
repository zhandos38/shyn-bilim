<?php

use frontend\models\CheckAssignmentForm;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\ArrayHelper;
use yii\web\View;

/* @var $this View */
/* @var $model CheckAssignmentForm */

$this->title = Yii::t('app', 'Получить сертификат/диплом');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Вопросы и ответы'), 'url' => ['site/questions']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => '#'];
?>
<div class="container rbt-section-gapBottom rbt-section-gapTop">
    <h1 class="mb-4">
    <?= $this->title ?>
</h1>

<?php $form = ActiveForm::begin() ?>

<div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'olympiad_id')->dropDownList(ArrayHelper::map(\common\models\Olympiad::find()->orderBy(['id' => SORT_DESC])->all(), 'id', 'name'), [
            'prompt' => Yii::t('app', 'Выберите олимпиаду')
        ]) ?>

        <?= $form->field($model, 'iin') ?>

        <?= Html::submitButton(Yii::t('app', 'Отправить'), ['class' => 'rbt-btn btn-gradient']) ?>
    </div>
</div>

<?php ActiveForm::end() ?>
</div>

