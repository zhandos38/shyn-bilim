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
        hash: null,
        isSent: false
    },
    methods: {
        setPreviousQuestion() {
            if (this.currentQuestionId === 0) {
                return false;
            }

            this.currentQuestionId--;
        },
        setNextQuestion() {
            if (this.currentQuestionId + 1 >= this.questions.length) {
                return false;
            }

            this.currentQuestionId++;
        },
        getTest() {
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

            for ($i = 0; $i <= this.questions.length; $i++) {
                if (this.currentQuestionId + 1 >= this.questions.length) {
                    console.log('Вы достигли максимума');
                    this.showResults();
                    return true;
                }

                this.currentQuestionId++;
                if (!this.questions[this.currentQuestionId].hasOwnProperty('selectedAnswerId')) {
                    return;
                }
            }
        },
        async showResults() {
            this.showResultActive = true;

            this.questions.forEach(question => {
                if (typeof question['answers'][question['selectedAnswerId']] !== 'undefined' && parseInt(question['answers'][question['selectedAnswerId']]['isRight'])) {
                    this.correctAnswerCount = parseInt(this.correctAnswerCount) + 1;
                }
            });

            let interval = setInterval(async () => {
                $.post({
                    url: '/ru/olympiad/set-result',
                    data: {id: this.id, assignmentId: this.assignmentId, point: this.correctAnswerCount, hash: this.hash},
                    success: async (result) => {
                        if (parseInt(result) === 1) {
                            clearInterval(interval);
                            this.isSent = true;
                        }
                    },
                    error: function () {
                        console.log('Set result error!');
                    }
                });
            }, 1000);

            this.timer = '0:00';
            clearInterval(this.interval);

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