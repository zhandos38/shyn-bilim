<?php
/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Вопросы и ответы');

$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['site/contact']];

use yii\helpers\Url; ?>
<style>
    .card {
        margin: 0;
        width: 100%;
        display: table-row;
    }

    .btn-link {
        text-align: left;
        color: #0a0a0a;
    }
</style>
<h1 class="mb-4">
    <?= $this->title ?>
</h1>
<div class="row">
    <div class="col-md-12">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne">1. Сұрақ: Олимпиадаға қалай қатысуға болады?</button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            Жауап:  Өз таңдауыңыздағы олимпиадаға барып, логотип астындағы Ереже батырмасын басыңыз, Ережемен толық танысып шығыңыз. Біздің талаптармен келіскен жағдайда қатысуыңызға болады.
                        </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo">
                            2. Сұрақ: Олимпиаданың жарнасын сайттан қалай төлеймін?
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            Жауап:  видео слайд
                        </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree">
                            3. Сұрақ: Сайттан төлем жасап қойып, олимпиада тапсырмасын басқа уақытта орындауға бола ма?
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            Жауап:  Жоқ, болмайды. Төлем жасалғаннан кейін тапсырма бірден ашылады.
                        </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour">
                           4. Сұрақ: Олимпиада жарнасын сайттан төлем жасай алмаған жағдайда не істеймін?
                        </button>
                    </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            Жауап:  Егер сайтта төлем жасауда қиындықтар туындаса: 8775 424 37 27 Феруза Изтаеваның Каспий голд номеріне 500 тг (бес жүз) аударып,
                            Чекті және ЖСН-іңізді bilimshini.kz@mail.ru электронды поштасына қатесіз жазып жіберуіңіз міндетті. 24 сағат ішінде Сізге «Тіркелді» деген жауап келеді. Электронды почтаңызға жауап келгеннен кейін ғана олимпиадаға қатысуға мүмкіндік ашылады. Жеке ұялы телефондарда, вадсапта мәселелер қарастырылмайды.
                        </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive">
                            5. Сұрақ: Мен жарнасын 8775 424 37 27 Феруза Изтаеваның Каспий голдына төлеп қойдым ЖСН-ді тіркеуге жібердім bilimshini.kz@mail.ru электронды поштасына. «Почтама «Тіркелдіңіз» деген жауап келді. Бірақ олимпиадаға қатысайын десем, «Төлем жаса» деп шығып тұр. Не істеуге болады.
                        </button>
                    </h2>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            Жауап:  Сіз электронды почтаға жіберіп, тіркеткен ЖСН-іңізді анкетаға жазған ЖСН –мен салыстырып көріңіз. Қате ЖСН-мен қатыса алмайсыз.
                        </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix">
                            6. Сұрақ: 8775 424 37 27 Феруза Изтаеваның Каспий голдына төлем жасалғаннан кейін bilimshini.kz@mail.ru электронды поштасына қандай чек жіберу керекпін?
                        </button>
                    </h2>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            Жауап:  Телефоныңыздағы Каспий приложениесіне кіріп, Историяның ішіндегі жасыл чекті bilimshini.kz@mail.ru электронды поштасына жіберуіңіз қажет
                        </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven">
                            7. Сұрақ: Олимпиада тапсырмаларын орындап отырып сайттан шығып кеткен жағдайда қайтадан тапсыра аламын ба?
                        </button>
                    </h2>
                </div>
                <div id="collapseSeven" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            Жауап:  Иә, тапсыра аласыз. Бірақ тест тапсырмалары басынан басталады. Тапсырмаға қайта кіру үшін төмендегі батырманы басыңыз
                            <a class="btn btn-primary" href="<?= Url::to(['olympiad/check-test']) ?>">Олимпиаданы жалғастыру</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight">
                            8. Сұрақ: Дипломды немесе Сертификатты жүктей алмай қалған жағдайда не істеймін?
                        </button>
                    </h2>
                </div>
                <div id="collapseEight" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            Жауап:  Егер Сіз Дипломды немесе Сертификатты жүктей алмай қалсаңыз төмендегі батырманы басыңыз.
                            <a class="btn btn-primary" href="<?= Url::to(['olympiad/check-cert']) ?>">Сертификат/Диплом қайта жүктеу</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine">
                            9. Сұрақ: Анкетаны қате толтыру салдарынан Дипломым немесе Сертификатым қате болып шыққан жағдайда не істеймін?
                        </button>
                    </h2>
                </div>
                <div id="collapseNine" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            Жауап: Егер Сіз анкетаны қателікпен толтырсаңыз, Сіздің марапат қағазыңыз жіберген қателікпен шығады. Қатені жөндеу үшін bilimshini.kz@mail.ru электронды поштасына жазасыз: «Менің марапат қағазымда (осы жақша ішіне қалай дұрыстау керектігін жазыңыз) қателік кетіп қалды. Дұрыстап алуға сіздердің көмектеріңіз қажет» деп, ЖСН-іңізді қоса жазыңыз. Сізге, почтаңызға дұрысталған марапат қағазының сілтемесі жіберіледі.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>