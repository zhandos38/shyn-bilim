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
        isSent: true
    },
    methods: {
        showLog(key1, key2) {
              console.log('selectedId', key1);
              console.log('id', key2);
        },
        selectAnswer(key) {
            Vue.set(this.questions[this.currentQuestionId], 'selectedAnswerId', key);
        },
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
                data: {id: this.assignmentId},
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
                error: function (err) {
                    console.log('Get test failed', err);
                }
            });
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
                    data: {assignmentId: this.assignmentId, point: this.correctAnswerCount, hash: this.hash},
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