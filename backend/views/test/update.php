<?php

use common\models\TestSubject;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use kartik\file\FileInput;
use yii\grid\GridView;
use yii\helpers\Html;
use common\models\Test;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Test */
/* @var $importForm \backend\forms\ImportForm */
/* @var $questionForm \backend\forms\QuestionForm */

$this->title = 'Обновить тест: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Тесты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="test-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<div class="question-index">

    <?php $form = ActiveForm::begin([
        'action' => ['test/import-test'],
        'method' => 'POST'
    ]) ?>

    <?= $form->field($importForm, 'test_id')->hiddenInput(['value' => $model->id])->label(false) ?>

    <?= $form->field($importForm, 'tempFile')->widget(FileInput::classname(), [
        'options' => ['accept' => 'document/*'],
    ]) ?>

    <?= Html::a('<fa class="fa fa-trash"></fa> Очистить', ['test/clear-questions', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>

    <?= Html::submitButton('<fa class="fa fa-download"></fa> Загрузить тест', ['class' => 'btn btn-success'] ) ?>

    <?php ActiveForm::end() ?>

</div>
<div>
    <button id="question-toggle-btn" class="btn btn-primary">Добавить вопрос</button>
</div>
<div id="question-box" style="display: none">
    <?php $form = ActiveForm::begin([
        'action' => ['test/add-question'],
        'method' => 'POST'
    ]) ?>

    <?= $form->field($questionForm, 'test_id')->hiddenInput(['value' => $model->id])->label(false) ?>

    <div>
        <?= $form->field($questionForm, 'question_text')->textarea() ?>
    </div>

    <div>
        <?= $form->field($questionForm, 'answer_1')->textarea() ?>
        <?= $form->field($questionForm, 'answer_1_is_right')->checkbox() ?>
    </div>

    <div>
        <?= $form->field($questionForm, 'answer_2')->textarea() ?>
        <?= $form->field($questionForm, 'answer_2_is_right')->checkbox() ?>
    </div>

    <div>
        <?= $form->field($questionForm, 'answer_3')->textarea() ?>
        <?= $form->field($questionForm, 'answer_3_is_right')->checkbox() ?>
    </div>

    <div>
        <?= $form->field($questionForm, 'answer_4')->textarea() ?>
        <?= $form->field($questionForm, 'answer_4_is_right')->checkbox() ?>
    </div>

    <div>
        <?= $form->field($questionForm, 'answer_5')->textarea() ?>
        <?= $form->field($questionForm, 'answer_5_is_right')->checkbox() ?>
    </div>

    <?= Html::submitButton('<fa class="fa fa-save"></fa> Сохранить', ['class' => 'btn btn-success'] ) ?>

    <?php ActiveForm::end() ?>
</div>
<div>
    <?php
    $counter = 1;
    foreach ($model->questionsTotal as $question): ?>
        <div id="question-<?= $question->id ?>" class="question-list__item">
            <p class="question-box__text"><?= $counter++ ?>) <?= $question->id ?>: <?= $question->text ?></p>
            <ul>
                <?php foreach ($question->answers as $answer): ?>
                    <li class="question-box__answer <?= $answer->is_right ? 'text-danger' : '' ?>"><?= $answer->id ?>: <?= $answer->text ?></li>
                <?php endforeach; ?>
            </ul>
            <button class="question-delete-btn btn btn-danger" data-id="<?= $question->id ?>"><i class="fa fa-trash"></i> Удалить <?= $question->id ?></button>
        </div>
    <?php endforeach; ?>
</div>
<?php
$js=<<<JS
$('#question-toggle-btn').click(() => {
    $('#question-box').toggle();
});

$('.question-delete-btn').click(function () {
    const questionId = $(this).data('id');
   $.post({
        url: '/test/delete-question',
        data: {
            id: questionId,
        },
        success: function () {
            $('#question-' + questionId).remove();
        },
        error(err) {
            console.log(err);
            alert(err);
        }
   }); 
});
JS;

$this->registerJs($js);
?>
<style>
    /* question */
    .question-list__item span, .question-box__text span, .question-box__answer span {
        top: 0 !important;
    }
</style>
