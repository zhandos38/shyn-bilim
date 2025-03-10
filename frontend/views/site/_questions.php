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
        <?php if (Yii::$app->language === 'kz'): ?>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            1. Сұрақ: Олимпиадаға қалай қатысуға болады?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Жауап:  Өз таңдауыңыздағы олимпиадаға барып, логотип астындағы Ереже батырмасын басыңыз, Ережемен толық танысып шығыңыз. Біздің талаптармен келіскен жағдайда қатысуыңызға болады.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            2. Сұрақ: Олимпиаданың жарнасын сайттан қалай төлеймін?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Жауап:
                            </p>
                            <p>
                                1. Олимпиадалар батырмасынан кейін  ҚАТЫСУ батырмасын басыңыз.
                                <img class="card-img" src="/img/pay-1.png" alt="pay-1">
                            </p>
                            <p>
                                2. МАТЕМАТИКА кнопкасын басыңыз.
                                <img class="card-img" src="/img/pay-2.png" alt="pay-2">
                            </p>
                            <p>
                                3. АНКЕТАНЫ қатесіз толтырып, төменгі жағындағы ЖІБЕРУ батырмасын басыңыз.
                                <img class="card-img" src="/img/pay-3.png" alt="pay-3">
                            </p>
                            <p>
                                4. Анкетаны толтырып болған соң, ТӨЛЕМ БЕТІ шығады. Суретте көрсетілгендей –Төлем картаңыздағы 16 санды жазыңыз.
                            </p>
                            <p>
                                5. ММ, ҮҮ, СVC белгілері тұсына Төлем картаңыздың артындағы сандарды жазаңыз.
                            </p>
                            <p>
                                6. ТОЛЫҚ толтырып болғаннан кейін ОПЛАТИТЬ 500т батырмасын басыңыз, одан кейін 10 секунд күтсеңіз Олимпиада тапсырмасы бірден ашылады, бетті жауып қоймаңыз.
                                <img class="card-img" src="/img/pay-4.png" alt="pay-4">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            3. Сұрақ: Сайттан төлем жасап қойып, олимпиада тапсырмасын басқа уақытта орындауға бола ма?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Жауап:  Жоқ, болмайды. Төлем жасалғаннан кейін тапсырма бірден ашылады.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            4. Сұрақ: Олимпиада жарнасын сайттан төлем жасай алмаған жағдайда не істеймін?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Жауап:  Егер сайтта төлем жасауда қиындықтар туындаса: +7 775 403 7284 Жаннаның Каспий голд номеріне 2000 тг (екі мың) аударып,
                            Чекті және ЖСН-іңізді bilimshini.kz@mail.ru электронды поштасына қатесіз жазып жіберуіңіз міндетті. 24 сағат ішінде Сізге «Тіркелді» деген жауап келеді. Электронды почтаңызға жауап келгеннен кейін ғана олимпиадаға қатысуға мүмкіндік ашылады. Жеке ұялы телефондарда, вадсапта мәселелер қарастырылмайды.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSix">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            5. Сұрақ: 775 076 78 76 Бахыткүл Е. каспий голдына төлем жасағаннан кейін қандай чекті, қайда жіберуім қажет?
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Жауап: Телефоныңыздағы Каспий приложениесіне кіріп, Историяның ішіндегі жасыл чекті және қатысушының ЖСН 8775 076 78 76 вадсапқа жіберуіңіз қажет
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSeven">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            6. Сұрақ: Олимпиада тапсырмаларын орындап отырып сайттан шығып кеткен жағдайда қайтадан тапсыра аламын ба?
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Жауап:  Иә, тапсыра аласыз. Бірақ тест тапсырмалары басынан басталады. Тапсырмаға қайта кіру үшін төмендегі батырманы басыңыз
                                <a class="btn btn-primary" href="<?= Url::to(['olympiad/check-test']) ?>">Олимпиаданы жалғастыру</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingEight">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                            7. Сұрақ: Дипломды, алғыс хатты немесе Сертификатты жүктей алмай қалған жағдайда не істеймін?
                        </button>
                    </h2>
                    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Жауап:  Егер Сіз Дипломды, Сертификатты, Алғыс хатты жүктей алмай қалсаңыз төмендегі батырманы басыңыз.
                                <br>
                                <a class="btn btn-primary" href="<?= Url::to(['olympiad/check-cert']) ?>">Сертификат/Диплом қайта жүктеу</a>
                                <br><br>
                                <a class="btn btn-primary" href="<?= Url::to(['olympiad/check-cert-thank-leader']) ?>">Грамота Мұғалім үшін жүктеу</a>
                                <br><br>
                                <a class="btn btn-primary" href="<?= Url::to(['olympiad/check-cert-thank-parent']) ?>">Алғыс хат Ата-Ана үшін жүктеу</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingNine">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                            8. Сұрақ: Анкетаны қате толтыру салдарынан Дипломым немесе Сертификатым қате болып шыққан жағдайда не істеймін?
                        </button>
                    </h2>
                    <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Жауап: Егер Сіз анкетаны қателікпен толтырсаңыз, Сіздің марапат қағазыңыз жіберген қателікпен шығады. Қатені жөндеу үшін 8775 403 72 84 немесе 8701 312 99 06 вадсабының біріне жазасыз: «Менің марапат қағазымда (осы жақша ішіне қалай дұрыстау керектігін жазыңыз) қателік кетіп қалды. Дұрыстап алуға сіздердің көмектеріңіз қажет» деп, ЖСН-іңізді қоса жазыңыз. Сізге,  дұрысталған марапат қағазының сілтемесі жіберіледі.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTen">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                            9. Сұрақ: Тапсырманы орындау барысында сұрақтар кері қайтады ма??
                        </button>
                    </h2>
                    <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Жауап:  Сұрақтар кері қайтпайды.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingEleven">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                            10. Сұрақ: Тапсырмада белгілеген жауаптың дұрыс-бұрыстығы көрсетіледі ме?
                        </button>
                    </h2>
                    <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Жауап:  Жауаптар олимпиада аяқталғанша құпия сақталады. Дұрыс жауап көрсетілмейді.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwelve">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                            11. Сұрақ: Аппеляцияға қашан-қалай беруге болады?
                        </button>
                    </h2>
                    <div id="collapseTwelve" class="accordion-collapse collapse" aria-labelledby="headingTwelve" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Жауап:  Аппеляциялық шағымдар олимпиаданың соңғы күні 15–шы желтоқсан bilimshini.kz@mail.ru электронды поштасында қабылданады. Қарауға 1күн  (жұмыс күні) уақыт қойылған.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            1. Вопрос: Как можно принять участие в олимпиаде?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Ответ:  Перейдите на выбранную Вами олимпиаду, нажмите на кнопку «Положение» под логотипом олимпиады, обязательно ознакомьтесь с положением. Вы можете участвовать, если согласны с нашими требованиями.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            2. Вопрос: Как можно произвести оплату через сайт?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Ответ:  Перейдите на выбранную Вами олимпиаду, нажмите на кнопку «Положение» под логотипом олимпиады, обязательно ознакомьтесь с положением. Вы можете участвовать, если согласны с нашими требованиями.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            3. Вопрос: Оплатив взнос за участие в олимпиаде, можно ли участвовать позже (в другое время)?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Ответ:  Нет, нельзя. После оплаты тестовые задания открываюся сразу же.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            4. Вопрос: Что мне делать, если я не могу произвести оплату через сайт?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Ответ:  Если у Вас возникли проблемы с оплатой на сайте: переведите 2000 (две тысячи) тенге на Каспи голд 7 775 403 7284 Жанна, далее Вам необходимо без ошибок отправить ИИН участника и чек на электронную почту bilimshini.kz@mail.ru. В течение 24 часов по электронной почте   вы получите ответ о том, что вы «Зарегистрированы». Только после получения ответа на свою электронную почту о регистрации, Вы сможете принять участие в олимпиаде. По личным мобильным телефонам и по ватсапу вопросы не рассматриваются.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSix">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            5. Вопрос: Куда отправить чек после оплаты на Каспи голд 8775 076 78 76 Бахыткүл Е.?
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Ответ:  Вам необходимо зайти на телефоне в приложение Каспи голд и отправить зеленый развернутый чек из историй на ватсап номер 8775 076 78 76.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSeven">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            6. Вопрос: Выполняя задания олимпиады, нечаянно вышла с сайта, как можно пройти заново олимпиаду?
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Ответ:  Да, Вы можете. Но тестовые задания начнутся с самого начала. Для того, чтобы пройти тест заново
                                <a class="btn btn-primary" href="<?= Url::to(['olympiad/check-test']) ?>">Продолжить олимпиаду</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingEight">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                            7. Вопрос: Что мне делать если я не могу скачать Диплом, Сертификат, Благодарственное письмо?
                        </button>
                    </h2>
                    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Ответ:  Если Вы не можете скачать Диплом, Сертификат, Благодарственное письмо, то
                                <br>
                                <a class="btn btn-primary" href="<?= Url::to(['olympiad/check-cert']) ?>">Сертификат/Диплом скачать</a>
                                <br><br>
                                <a class="btn btn-primary" href="<?= Url::to(['olympiad/check-cert-thank-leader']) ?>">Грамота для руководителя скачать</a>
                                <br><br>
                                <a class="btn btn-primary" href="<?= Url::to(['olympiad/check-cert-thank-parent']) ?>">Благодарственное письмо для родителей скачать</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingNine">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                            8. Вопрос: Что мне делать, если мой Диплом или Сертификат оказался с ошибками из-за неправильного заполнения анкеты ?
                        </button>
                    </h2>
                    <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Ответ:  Если вы заполните анкету неправильно, ваш Диплом выйдет с ошибками. Чтобы исправить ошибки, напишите на наш WhatsApp номер 8775 403 72 84 немесе 8701 312 99 06 : «В моем сертификате есть ошибка (в скобках напишите, как ее исправить). Нам нужна ваша помощь, чтобы все исправить» вместе с ИИН участника. Вам будет отправлена ссылка Диплома  на вашу электронную почту с исправленными ошибками.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTen">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                            9. Вопрос: Возвращаются ли вопросы во время выполнения тестовых заданий?
                        </button>
                    </h2>
                    <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Ответ:  Вопросы не возвращаются.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingEleven">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                            10. Вопрос: После ввода ответа, можно ли увидеть правильный ответ?
                        </button>
                    </h2>
                    <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Ответ:  Ответы будут храниться до конца олипиады. Правильный ответ не отображается.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwelve">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                            11. Вопрос: Когда и как можно подать на аппеляцию?
                        </button>
                    </h2>
                    <div id="collapseTwelve" class="accordion-collapse collapse" aria-labelledby="headingTwelve" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Ответ:  Апелляции принимаются в последний день олимпиады 15–го декабря по электронной почте bilimshini.kz@mail.ru. На рассмотрение апелляции берется 1 день.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
