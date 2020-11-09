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

    <?php $form = ActiveForm::begin([
        'action' => ['test-subject/import-test'],
        'method' => 'POST'
    ]) ?>

    <?= $form->field($importForm, 'test_subject')->hiddenInput(['value' => $model->id])->label(false) ?>

    <?= $form->field($importForm, 'tempFile')->widget(FileInput::classname(), [
        'options' => ['accept' => 'document/*'],
    ]) ?>

    <?= Html::a('<fa class="fa fa-trash"></fa> Очистить', ['test-subject/clear-questions', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>

    <?= Html::submitButton('<fa class="fa fa-download"></fa> Загрузить тест', ['class' => 'btn btn-success'] ) ?>

    <?php ActiveForm::end() ?>
    
</div>
<div>
    <?php
    $counter = 1;
    foreach ($model->questionsTotal as $question): ?>
        <div>
            <p><?= $counter++ ?>) <?= $question->id ?>: <?= $question->text ?></p>
            <ul>
                <?php foreach ($question->answers as $answer): ?>
                    <li class="<?= $answer->is_right ? 'text-danger' : '' ?>"><?= $answer->id ?>: <?= $answer->text ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endforeach; ?>
</div>

