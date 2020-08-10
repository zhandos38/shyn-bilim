<?php
use yii\web\View;

/* @var $this View */
/* @var $id integer */
/* @var $assignment_id integer */
/* @var $subject_name String */

$this->title = $subject_name;
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['subject/test']];
?>
    <div id="test">
        <div class="container test-app__container">
            <h1><?= $this->title ?></h1>
            <div class="test-app__timer"><?= Yii::t('app', 'Оставшееся время:') ?> {{ timer }}</div>
            <div v-if="!showResultActive">
                <div class="questions-count">Вопрос: {{ currentQuestionId + 1 }}/{{ questions.length }}</div>
                <div class="question-box" v-if="questions[currentQuestionId]">
                    <div class="question-box__text" v-html="questions[currentQuestionId].text"></div>
                    <div class="question-box__container">
                        <div class="question-box__answer" v-for="(answer, key) in questions[currentQuestionId].answers">
                            <input v-bind:id="answer.id" class="question-box__answer-input" type="radio" v-bind:name="questions[currentQuestionId].id" v-model="questions[currentQuestionId].selectedAnswerId" v-bind:value="key">
                            <label v-bind:for="answer.id" class="question-box__answer-text" v-html="answer.text"></label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-info site-button" v-on:click="nextQuestion">Следующий вопрос</button>
            </div>
            <div v-else>
                <div class="questions-correct-count">Вы набрали: {{ correctAnswerCount }}</div>
            </div>
        </div>
    </div>
<?php
$js =<<<JS
testApp.id = "$id";
testApp.assignmentId = "$assignment_id";
testApp.getTest();
JS;

$this->registerJsFile( '@web/js/vue.js', ['position' => View::POS_END]);
$this->registerJsFile( '@web/js/test.js', ['position' => View::POS_END]);
$this->registerJs($js, View::POS_END);
?>