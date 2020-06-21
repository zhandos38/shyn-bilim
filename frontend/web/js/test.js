testApp = new Vue({
    el: '#test',
    data: {
        id: null,
        assignmentId: null,
        questions: [],
        timer: null,
        interval : null,
        timeLimit: null,
        correctAnswerCount: 0,
        currentQuestionId: 0,
        showResultActive: false,
    },
    methods: {
        getTest() {
            console.log(this.id);
            $.get({
                url: 'get-test',
                format: 'JSON',
                data: {id: this.id},
                success: (result) => {
                    this.timeLimit = result['timeLimit'];
                    this.startTimer();
                    result['questions'].forEach((question) => {
                         this.questions.push({
                             id: question['id'],
                             text: question['text'],
                             answers: question['answers']
                         });
                    });
                },
                error: function () {
                    console.log('Get test failed');
                }
            });
        },
        nextQuestion() {
            if (this.questions[this.currentQuestionId]['selectedAnswerId'] === undefined) {
                console.log('Нужно ответить на вопрос');
                return true;
            }

            if (this.currentQuestionId + 1 >= this.questions.length) {
                console.log('Вы достигли максимума');
                this.showResults();
                return true;
            }

            this.currentQuestionId++;
        },
        showResults() {
            this.showResultActive = true;

            this.questions.forEach(question => {
                if (typeof question['answers'][question['selectedAnswerId']] !== 'undefined' && question['answers'][question['selectedAnswerId']]['isRight']) {
                    this.correctAnswerCount++;
                }
            });

            $.post({
                url: 'set-result',
                data: {id: this.id, assignmentId: this.assignmentId, point: this.correctAnswerCount},
                success: (result) => {
                    console.log(result);

                    this.timer = '0:00';
                    clearInterval(this.interval);
                },
                error: function () {
                    console.log('Set result error!');
                }
            });

            console.log('Correct answers are: ' + this.correctAnswerCount);
        },
        startTimer() {
            this.timer = this.timeLimit + ':00';

            this.interval = setInterval(() => {
                let timeArray = this.timer.split(/[:]+/);
                let m = timeArray[0];
                let s = this.checkSecond((timeArray[1] - 1));
                if(s === '59') {
                    m = m - 1;
                }

                this.timer = m + ":" + s;

                if (this.timer === '0:00') {
                    clearInterval(this.interval);
                    this.showResults();
                }
            }, 1000);
        },
        checkSecond(sec) {
            if (sec < 10 && sec >= 0) {sec = "0" + sec} // add zero in front of numbers < 10
            if (sec < 0) {sec = "59"}
            return sec;
        }
    },
    mounted() {
        console.log(!this.showResultActive);
    }
});