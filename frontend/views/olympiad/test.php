<?php

use yii\helpers\Url;
use yii\web\View;

/* @var $this View */
/* @var $assignment_id integer */
/* @var $test_name String */

$this->title = $olympiad_name;
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['subject/test']];
?>
<div id="test" class="pb--60 pt--60">
    <div class="container test-app__container">
        <h1><?= $this->title ?></h1>
        <div class="test-app__timer"><?= Yii::t('app', 'Оставшееся время:') ?> {{ timer }}</div>
        <div v-if="!showResultActive">
            <div class="questions-count"><?= Yii::t('app', 'Вопрос') ?>: {{ currentQuestionId + 1 }}/{{ questions.length }}</div>
            <span style="font-size: 12px">
                <i>ТЕСТТІ СКРИНШОТТАУҒА, WHATSAPP ЖЕЛІЛЕРІНЕ ТАРАТУҒА ҚАТАҢ ТЫЙЫМ САЛЫНАДЫ</i>
            </span>
            <div class="question-box mt--10" v-if="questions[currentQuestionId]">
                <div class="question-box__text" v-html="questions[currentQuestionId].text"></div>
                <div class="question-box__container mt--10">
                    <div class="question-box__answer" v-for="(answer, key) in questions[currentQuestionId].answers">
                        <input v-bind:id="answer.id" class="question-box__answer-input" type="radio" :name="'question' + questions[currentQuestionId].id" @click="selectAnswer(key)">
                        {{ (key + 1) + ')' }} <label v-bind:for="answer.id" class="question-box__answer-text" v-html="answer.text"></label>
                    </div>
                </div>
            </div>
            <div class="mt--20">
                <b>{{ typeof questions[currentQuestionId].selectedAnswerId !== 'undefined' ? 'Выбран ответ: ' + (questions[currentQuestionId].selectedAnswerId + 1) : 'Ответ не выбран' }}</b>
            </div>
            <div class="mt--10">
                <button id="nextQuestionButton" class="rbt-btn" @click="setNextQuestion"><?= Yii::t('app', 'Следующий вопрос') ?> <i class="fa fa-arrow-right"></i></button>
                <button class="rbt-btn rbt-gradient site-button" v-on:click="showResults" v-if="(currentQuestionId + 1) === questions.length"><i class="fa fa-flag-checkered"></i> <?= Yii::t('app', 'Завершить') ?></button>
            </div>
        </div>
        <div v-else>
            <div class="questions-correct-count"><?= Yii::t('app', 'Вы набрали') ?>: {{ correctAnswerCount }}</div>
            <div class="mt--20">
                <small>
                    Қатысушылар жинаған балдарына сәйкес сертификаттар алады, ал жоғары балл жинаған оқушыларға Бас жүлде және І, ІІ, ІІ дәрежелі дипломдар беріледі. Дипломдар мен сертификаттарды жүктеу ақылы түрде,  жарнасы - 500 тг. (ата-анасының немесе демеушілердің рұқсатымен). 8(775)424-37-27 Феруза И. Kaspi Gold номеріне төлем жасап, төлем чекті, толық аты-жөнің, қатысқан пәніңізді жазып,  және қатысушы оқушының ЖСН-н (қатесіз ЖСН жазыңыз) 8775 424 37 27 WhatsApp номеріне  жіберуіге болады. WhatsApp бойынша төлемді тіркеу туралы жауап алғаннан кейін сіз сайттың басты бетінен «КӨМЕК» деген жерден, дипломыңызды немесе сертификатыңызды жүктей аласыз.
                </small>
            </div>
            <div class="mt--10">
                <a class="rbt-btn btn-gradient" :class="!isSent ? 'disabled-link' : ''" href="<?= Url::to(['/olympiad/get-cert', 'id' => $assignment_id]) ?>" download>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" v-if="!isSent"></span>
                    <?= Yii::t('app', 'Получить сертификат/диплом') ?>
                </a>
            </div>
            <div class="mt--10">
                <a class="rbt-btn btn-gradient" :class="!isSent ? 'disabled-link' : ''" href="<?= Url::to(['/olympiad/get-cert-thank-leader', 'id' => $assignment_id]) ?>" download>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" v-if="!isSent"></span>
                    <?= Yii::t('app', 'Получить грамоту преподавателя') ?>
                </a>
            </div>
        </div>
    </div>
</div>
<?php
$hash = md5( 'zohan'.(string)$assignment_id );
$js =<<<JS
testApp.hash = "$hash";
testApp.assignmentId = "$assignment_id";
testApp.getTest();

$('#previousQuestionButton, #nextQuestionButton').click(function() {
  $('body').find('.question-box__answer-input').each(function() {
    $(this).prop('checked', false);
  });
});
JS;

$this->registerJsFile( '@web/js/vue.js', ['position' => View::POS_END]);
$this->registerJsFile( '@web/js/test.js', ['position' => View::POS_END]);
$this->registerJs($js, View::POS_END);
?>
