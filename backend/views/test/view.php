<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Test;

/* @var $this yii\web\View */
/* @var $model common\models\Test */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<style>
    .content img {
        position: relative;
        top: -12px;
    }
</style>
<div class="test-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Назад', ['index', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'subject_id',
                'value' => function(Test $model) {
                    return $model->subject->name_kz;
                }
            ],
            'grade',
            'questions_limit',
            'time_limit',
            'lang',
            [
                'attribute' => 'created_at',
                'value' => function(Test $model) {
                    return date('d-m-Y H:i', $model->created_at);
                }
            ],
            [
                'label' => 'Всего вопросов',
                'value' => function(Test $model) {
                    return count($model->questionsTotal);
                }
            ]
        ],
    ]) ?>

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

</div>
