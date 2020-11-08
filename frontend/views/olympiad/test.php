<?php
use yii\web\View;

/* @var $this View */
/* @var $test_id integer */
/* @var $assignment_id integer */
/* @var $test_name String */

$this->title = $test_name;
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['subject/test']];
?>
    <div id="test">
        <div class="container test-app__container">
            <h1><?= $this->title ?></h1>
            <div class="test-app__timer"><?= Yii::t('app', 'Оставшееся время:') ?> {{ timer }}</div>
            <div v-if="!showResultActive">
                <div class="questions-count"><?= Yii::t('app', 'Вопрос') ?>: {{ currentQuestionId + 1 }}/{{ questions.length }}</div>
                <div class="question-box" v-if="questions[currentQuestionId]">
                    <div class="question-box__text" v-html="questions[currentQuestionId].text"></div>
                    <div class="question-box__container">
                        <div class="question-box__answer" v-for="(answer, key) in questions[currentQuestionId].answers">
                            <input v-bind:id="answer.id" class="question-box__answer-input" type="radio" v-bind:name="questions[currentQuestionId].id" v-model="questions[currentQuestionId].selectedAnswerId" v-bind:value="key">
                            <label v-bind:for="answer.id" class="question-box__answer-text" v-html="answer.text"></label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-info site-button" v-on:click="nextQuestion"><?= Yii::t('app', 'Следующий вопрос') ?></button>
            </div>
            <div v-else>
                <div class="questions-correct-count"><?= Yii::t('app', 'Вы набрали') ?>: {{ correctAnswerCount }}</div>
                <div>
                    <a class="btn btn-success" :class="!isSent ? 'disabled-link' : ''" href="<?= \yii\helpers\Url::to(['/olympiad/get-cert', 'id' => $assignment_id]) ?>">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" v-if="!isSent"></span>
                        <?= Yii::t('app', 'Получить сертификат/диплом') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php
$hash = md5( 'zohan'.(string)$assignment_id );
$js =<<<JS
testApp.id = "$test_id";
testApp.hash = "$hash";
testApp.assignmentId = "$assignment_id";
testApp.getTest();
JS;

$this->registerJsFile( '@web/js/vue.js', ['position' => View::POS_END]);
$this->registerJsFile( '@web/js/test.js', ['position' => View::POS_END]);
$this->registerJs($js, View::POS_END);
?>