<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TestSubject */

$this->title = 'Обновить тест-предмет: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Test Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="test-subject-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<div class="question-index">

    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($importForm, 'tempFile')->widget(FileInput::classname(), [
        'options' => ['accept' => 'document/*'],
    ]) ?>

    <?= Html::a('<fa class="fa fa-trash"></fa> Очистить', ['test-subject/clear-questions', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>

    <?= Html::a('<fa class="fa fa-download"></fa> Загрузить тест', ['test-subject/update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end() ?>
    
</div>
