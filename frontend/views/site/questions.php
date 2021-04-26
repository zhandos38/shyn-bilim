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
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne">
                            1. Сұрақ: Олимпиадаға қалай қатысуға болады?
                        </button>
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
                            8. Сұрақ: Дипломды, алғыс хатты немесе Сертификатты жүктей алмай қалған жағдайда не істеймін?
                        </button>
                    </h2>
                </div>
                <div id="collapseEight" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            Жауап:  Егер Сіз Дипломды, Сертификатты, Алғыс хатты жүктей алмай қалсаңыз төмендегі батырманы басыңыз.
                            <a class="btn btn-primary" href="<?= Url::to(['olympiad/check-cert']) ?>">Сертификат/Диплом қайта жүктеу</a>
                            <br>
                            <a class="btn btn-primary" href="<?= Url::to(['olympiad/check-cert-thank']) ?>">Алғыс хатты жүктеу</a>
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
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine">
                            10. Сұрақ: Тапсырманы орындау барысында сұрақтар кері қайтады ма??
                        </button>
                    </h2>
                </div>
                <div id="collapseNine" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            Жауап:  Сұрақтар кері қайтпайды.
                        </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine">
                            11. Сұрақ: Тапсырмада белгілеген жауаптың дұрыс-бұрыстығы көрсетіледі ме?
                        </button>
                    </h2>
                </div>
                <div id="collapseNine" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            Жауап:  Жауаптар олимпиада аяқталғанша құпия сақталады. Дұрыс жауап көрсетілмейді.
                        </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine">
                            12. Сұрақ: Аппеляцияға қашан-қалай беруге болады?
                        </button>
                    </h2>
                </div>
                <div id="collapseNine" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            Жауап:  Аппеляциялық шағымдар олимпиаданың соңғы күні30 –шы мамырда bilimshini.kz@mail.ru электронды поштасында қабылданады. Қарауға 1күн  (жұмыс күні) уақыт қойылған.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne">
                                1. Вопрос: Как можно принять участие в олимпиаде?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Ответ:  Перейдите на выбранную Вами олимпиаду, нажмите на кнопку «Положение» под логотипом олимпиады, обязательно ознакомьтесь с положением. Вы можете участвовать, если согласны с нашими требованиями.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo">
                                2. Вопрос: Как можно произвести оплату через сайт?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Жауап:
                            </p>
                            <p>
                                1. После нажатия кнопки «ОЛИМПИАДЫ», нажмите кнопку «УЧАСТИЕ»
                                <img class="card-img" src="/img/pay-1.png" alt="pay-1">
                            </p>
                            <p>
                                2.Нажмите на кнопку «МАТЕМАТИКА»
                                <img class="card-img" src="/img/pay-2.png" alt="pay-2">
                            </p>
                            <p>
                                3. Заполните АНКЕТУ без ошибок и нажмимте внизу на кнопку «ОТПРАВИТЬ»
                                <img class="card-img" src="/img/pay-3.png" alt="pay-3">
                            </p>
                            <p>
                                4.	Далее после заполнения анкеты появится ПЛАТЕЖНАЯ СТРАНИЦА. Как показано на картинке - Напишите 16 цифр на своей платежной карте.
                            </p>
                            <p>
                                5. Напишите числа на обратной стороне своей Платежной карты рядом с символами MM, YY, CVC
                            </p>
                            <p>
                                6.	После заполнения данных платежной карты, нажмите кнопку PAY 500т, затем подождите 10 секунд, задания олимпиады откроются сразу, не закрывайте страницу
                                <img class="card-img" src="/img/pay-4.png" alt="pay-4">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree">
                                3. Вопрос: Оплатив взнос за участие в олимпиаде, можно ли участвовать позже (в другое время)?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Ответ:  Нет, нельзя. После оплаты тестовые задания открываюся сразу же.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour">
                                4. Вопрос: Что мне делать, если я не могу произвести оплату через сайт?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Ответ:  Если у Вас возникли проблемы с оплатой на сайте: переведите 500 (пятьсот) тенге на номер 8775 424 37 27 Кaspi Gold Изтаевой Ферузе, далее Вам необходимо без ошибок отправить ИИН участника и чек на электронную почту bilimshini.kz@mail.ru. В течение 24 часов по электронной почте   вы получите ответ о том, что вы «Зарегистрированы». Только после получения ответа на свою электронную почту о регистрации, Вы сможете принять участие в олимпиаде. По личным мобильным телефонам и по ватсапу вопросы не рассматриваются.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive">
                                5. Вопрос: Произвела оплату через Каспи Голд Изтаевой Ферузе по номеру 87754243727, скинула на электронную почту bilimshini.kz@mail.ru чек и ИИН. На электронную почту пришел ответ о «Регистрации». Но когда я хочу принять участие в олимпиаде, все время выходит платежная страница. Что делать?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Ответ:  Сравните ИИН, который вы отправили на электронную почту, с ИИН, который вы указали в анкете. Вы не сможете участвовать с неправильным ИИНом.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix">
                                6. Вопрос: Какой чек мне нужно отправить на электронную почту bilimshini.kz@mail.ru после оплаты на Каспи голд Изтаевой Ферузе по номеру  8775 424 37 27?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Ответ:  Вам необходимо зайти на телефоне в приложение Каспи голд и отправить зеленый развернутый чек из историй на электронную почту bilimshini.kz@mail.ru.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven">
                                7. Вопрос: Выполняя задания олимпиады, нечаянно вышла с сайта, как можно пройти заново олимпиаду?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseSeven" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Ответ:  Да, Вы можете. Но тестовые задания начнутся с самого начала. Для того, чтобы пройти тест заново
                                <a class="btn btn-primary" href="<?= Url::to(['olympiad/check-test']) ?>">Продолжить олимпиаду</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight">
                                8. Вопрос: Что мне делать если я не могу скачать Диплом, Сертификат, Благодарственное письмо?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseEight" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Ответ:  Если Вы не можете скачать Диплом, Сертификат, Благодарственное письмо, то
                                <a class="btn btn-primary" href="<?= Url::to(['olympiad/check-cert']) ?>">Сертификат/Диплом скачать</a>
                                <br>
                                <a class="btn btn-primary" href="<?= Url::to(['olympiad/check-cert-thank']) ?>">Получить благодарственное письмо</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine">
                                9. Вопрос: Что мне делать, если мой Диплом или Сертификат оказался с ошибками из-за неправильного заполнения анкеты ?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseNine" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Ответ:  Если вы заполните анкету неправильно, ваш Диплом выйдет с ошибками. Чтобы исправить ошибки, напишите на электронную почту bilimshini.kz@mail.ru: «В моем сертификате есть ошибка (в скобках напишите, как ее исправить). Нам нужна ваша помощь, чтобы все исправить» вместе с ИИН участника. Вам будет отправлена ссылка Диплома  на вашу электронную почту с исправленными ошибками.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine">
                                10. Вопрос: Возвращаются ли вопросы во время выполнения тестовых заданий?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseNine" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Ответ:  Вопросы не возвращаются.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine">
                                11. Вопрос: После ввода ответа, можно ли увидеть правильный ответ?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseNine" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Ответ:  Ответы будут храниться до конца олипиады. Правильный ответ не отображается.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine">
                                12. Вопрос: Когда и как можно подать на аппеляцию?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseNine" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Ответ:  Апелляции принимаются в последний день олимпиады 30 мая по электронной почте bilimshini.kz@mail.ru. На рассмотрение апелляции берется 1 день.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>