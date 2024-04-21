<?php
/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Вопросы и ответы');

$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['site/contact']];

use yii\helpers\Url; ?>
<div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h2 class="title"><?= $this->title ?></h2>
                    <ul class="page-list">
                        <li class="rbt-breadcrumb-item"><a href="/">Басты бет</a></li>
                        <li>
                            <div class="icon-right"><i class="feather-chevron-right"></i></div>
                        </li>
                        <li class="rbt-breadcrumb-item active"><?= $this->title ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="rbt-accordion-area accordion-style-1 bg-color-white rbt-section-gap">
    <div class="container">
        <div class="row g-5">
            <?php if (Yii::$app->language === 'kz'): ?>
                <div class="col-lg-6">
                    <div class="rbt-accordion-style accordion">
                        <div class="section-title text-start mb--60">
                            <h4 class="title">Олимпиада</h4>
                        </div>
                        <div class="rbt-accordion-style rbt-accordion-04 accordion">
                            <div class="accordion" id="faqs-accordionExamplec3">
                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="faqs-headingThree1">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-collapseThree1" aria-expanded="true" aria-controls="faqs-collapseThree1">
                                            ОЛИМПИАДА ЖАРНАСЫН САЙТТАН ТӨЛЕМ ЖАСАЙ АЛМАҒАН ЖАҒДАЙДА НЕ ІСТЕЙМІН?
                                        </button>
                                    </h2>

                                    <div id="faqs-collapseThree1" class="accordion-collapse collapse show" aria-labelledby="faqs-headingThree1" data-bs-parent="#faqs-accordionExamplec3" style="">
                                        <div class="accordion-body card-body">
                                            <p>
                                                Сайттан төлем жасау қиындық туғызған жағдайда, мына сілтемені
                                                <a class="btn-link" href="https://pay.kaspi.kz/pay/lzlvssh5">kaspi</a>
                                                басып, 500 тг жазу арқылы төлем жасап, чекті және қатысушы оқушының ЖСН-ін төмендегі вадсап номерлердің біріне ғана жіберу керек
                                                <a class="btn-link" href="https://wa.me/77754243727">+7(775)424 37 27</a>,
                                                <a class="btn-link" href="https://wa.me/77754037284">+7(775)403 72 84</a>
                                                <br>
                                                «ТІРКЕЛДІ» деген жауап алғаннан кейін олимпиадаға қатысуға болады.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="faqs-headingThree2">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-collapseThree2" aria-expanded="false" aria-controls="faqs-collapseThree2">
                                            САЙТТАН ТӨЛЕМ ЖАСАП ҚОЙЫП, ОЛИМПИАДА ТАПСЫРМАСЫН БАСҚА УАҚЫТТА ОРЫНДАУҒА БОЛАМА?
                                        </button>
                                    </h2>
                                    <div id="faqs-collapseThree2" class="accordion-collapse collapse" aria-labelledby="faqs-headingThree2" data-bs-parent="#faqs-accordionExamplec3">
                                        <div class="accordion-body card-body">
                                            <p>
                                                Жоқ, болмайды. Төлем жасалғаннан кейін тапсырма бірден ашылады.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="faqs-headingThree11">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-collapseThree11" aria-expanded="false" aria-controls="faqs-collapseThree11">
                                            ЖАРНА ТӨЛЕНДІ. «ТІРКЕЛДІ» ДЕГЕН ЖАУАП АЛДЫМ. БІРАҚ САЙТТА «ТӨЛЕМ ЖАСАУ» БЕТІ  ШЫҒЫП ТҰР. НЕ ІСТЕУГЕ БОЛАДЫ?
                                        </button>
                                    </h2>
                                    <div id="faqs-collapseThree11" class="accordion-collapse collapse" aria-labelledby="faqs-headingThree11" data-bs-parent="#faqs-accordionExamplec11">
                                        <div class="accordion-body card-body">
                                            <p>
                                                Сіз тіркеткен ЖСН-ді анкетаға жазған ЖСН-мен салыстырып көріңіз. Қате ЖСН-мен қатыса алмайсыз. Егер ондай қателік болмаса,
                                                тексеру <a href="https://wa.me/77786252078">+7(778) 625 20 78</a> осы ватсап номерге ЧЕК+ЖСН қайта жіберіңіз.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="faqs-headingThree4">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-collapseThree4" aria-expanded="false" aria-controls="faqs-collapseThree4">
                                            ОЛИМПИАДА ТАПСЫРМАЛАРЫН ОРЫНДАП ОТЫРЫП САЙТТАН ШЫҒЫП КЕТКЕН ЖАҒДАЙДА ҚАЙТАДАН ТАПСЫРА АЛАМЫН БА?
                                        </button>
                                    </h2>
                                    <div id="faqs-collapseThree4" class="accordion-collapse collapse" aria-labelledby="faqs-headingThree4" data-bs-parent="#faqs-accordionExamplec3">
                                        <div class="accordion-body card-body">
                                            <p>
                                                Иә, тапсыра аласыз. Бірақ тест тапсырмалары басынан басталады. Тапсырмаға қайта кіру үшін төмендегі батырманы басыңыз.
                                            </p>
                                            <a class="rbt-btn" href="<?= Url::to(['olympiad/check-test']) ?>">Олимпиаданы жалғастыру</a>
                                        </div>
                                    </div>
                                </div>


                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="faqs-headingThree5">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-collapseThree5" aria-expanded="false" aria-controls="faqs-collapseThree5">
                                            ОЛИМПИАДА НӘТИЖЕСІ БОЙЫНША ДИПЛОМДЫ НЕМЕСЕ СЕРТИФИКАТТЫ ЖҮКТЕЙ АЛМАЙ ҚАЛҒАН ЖАҒДАЙДА НЕ ІСТЕЙМІН?
                                        </button>
                                    </h2>
                                    <div id="faqs-collapseThree5" class="accordion-collapse collapse" aria-labelledby="faqs-headingThree5" data-bs-parent="#faqs-accordionExamplec3">
                                        <div class="accordion-body card-body">
                                            <p>
                                                Егер Сіз Дипломды, Сертификатты, Алғыс хатты жүктей алмай қалсаңыз, төмендегі батырманы басыңыз.
                                                <br>
                                                <a class="rbt-btn" href="<?= Url::to(['olympiad/check-cert']) ?>">Сертификат/Диплом қайта жүктеу</a>
                                                <br><br>
                                                <a class="rbt-btn" href="<?= Url::to(['olympiad/check-cert-thank-leader']) ?>">Грамота Мұғалім үшін жүктеу</a>
                                                <br><br>
                                                <a class="rbt-btn" href="<?= Url::to(['olympiad/check-cert-thank-parent']) ?>">Алғыс хат Ата-Ана үшін жүктеу</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="faqs-headingThree6">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-collapseThree6" aria-expanded="false" aria-controls="faqs-collapseThree6">
                                            ДИПЛОМ НЕМЕСЕ СЕРТИФИКАТТА ҚАТЕ БОЛҒАН ЖАҒДАЙДА НЕ ІСТЕЙМІН?
                                        </button>
                                    </h2>
                                    <div id="faqs-collapseThree6" class="accordion-collapse collapse" aria-labelledby="faqs-headingThree6" data-bs-parent="#faqs-accordionExamplec3">
                                        <div class="accordion-body card-body">
                                            <p>
                                                Жауап: Қатені жөндеу үшін <a class="btn-link" href="https://wa.me/77754037284">+7(775) 403 72 84</a> ватсап номеріне жазасыз: «Менің марапат қағазымда (осы жақша ішіне қалай дұрыстау керектігін жазыңыз) қателік кетіп қалды. Дұрыстап алуға сіздердің көмектеріңіз қажет» деп, ЖСН-ңізді қоса жазыңыз. Сізге, дұрысталғын марапат қағазының сілтемесі жіберіледі.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="faqs-headingThree7">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-collapseThree7" aria-expanded="false" aria-controls="faqs-collapseThree7">
                                            АПЕЛЛЯЦИЯҒА ҚАШАН-ҚАЛАЙ БЕРУГЕ БОЛАДЫ?
                                        </button>
                                    </h2>
                                    <div id="faqs-collapseThree7" class="accordion-collapse collapse" aria-labelledby="faqs-headingThree7" data-bs-parent="#faqs-accordionExamplec3">
                                        <div class="accordion-body card-body">
                                            <p>
                                                Апелляциялық шағымдар олимпиада аяқталған күннің ертесіне 18.00-ге дейін қабылданады.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="faqs-headingThree8">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-collapseThree8" aria-expanded="false" aria-controls="faqs-collapseThree8">
                                            БАЙЛАНЫС НОМЕРЛЕРІ ҚАЖЕТ.
                                        </button>
                                    </h2>
                                    <div id="faqs-collapseThree8" class="accordion-collapse collapse" aria-labelledby="faqs-headingThree8" data-bs-parent="#faqs-accordionExamplec3">
                                        <div class="accordion-body card-body">
                                            <p>
                                                Олимипиадалар бойынша ватсапқа жазасыз:
                                                <a class="btn-link" href="https://wa.me/77754243727">+7(775) 424 37 27</a>,
                                                <a class="btn-link" href="https://wa.me/77754037284">+7(775) 403 72 84</a>

                                                <br>Журналға материал жариялау бойынша: <a class="btn-link" href="https://wa.me/77786252078">+7(778) 625 20 78</a>
                                                <br>Кері байланысты сабырмен күтесіздер. 24 сағат ішінде жауап беріледі.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="faqs-headingThree9">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-collapseThree9" aria-expanded="false" aria-controls="faqs-collapseThree9">
                                            ЖҰМЫС УАҚЫТЫН БІЛУГЕ БОЛА МА?
                                        </button>
                                    </h2>
                                    <div id="faqs-collapseThree9" class="accordion-collapse collapse" aria-labelledby="faqs-headingThree9" data-bs-parent="#faqs-accordionExamplec3">
                                        <div class="accordion-body card-body">
                                            <p>
                                                Жұмыс уақыты: 9.00-19.00 сағат аралығы.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                <div class="rbt-accordion-style accordion">
                    <div class="section-title text-start mb--60">
                        <h4 class="title">Материал базасы</h4>
                    </div>
                    <div class="rbt-accordion-style rbt-accordion-04 accordion">
                        <div class="accordion" id="accordionExamplec3">
                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingThree1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree1" aria-expanded="false" aria-controls="collapseThree1">
                                        САЙТҚА МАТЕРИАЛ ЖАРИЯЛАУ БАРЫСЫНДА СЕРТИФИКАТ НЕМЕСЕ ГРАМОТА ЖҮКТЕЙ АЛМАЙ ҚАЛҒАН ЖАҒДАЙДА ҚАЛАЙ АЛУЫМА БОЛАДЫ?
                                    </button>
                                </h2>
                                <div id="collapseThree1" class="accordion-collapse collapse" aria-labelledby="headingThree1" data-bs-parent="#accordionExamplec3" style="">
                                    <div class="accordion-body card-body">
                                        <p>
                                            Жауап: Егер Сіз Дипломды, Сертификатты, Алғыс хатты жүктей алмай қалсаңыз төмендегі батырманы басыңыз.
                                            Материал жариялау бойынша қосымша сұрақтарыңыз болса: <a class="btn-link" href="https://wa.me/77786252078">+7(778) 625 20 78</a> WhatsApp номеріне жазасыз.
                                        </p>
                                        <br>
                                        <a class="rbt-btn" href="<?= Url::to(['article/check-cert']) ?>">Сертифика қайта жүктеу</a>
                                        <br><br>
                                        <a class="rbt-btn" href="<?= Url::to(['article/check-charter']) ?>">Грамота қайта жүктеу</a>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingThree2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree2" aria-expanded="false" aria-controls="collapseThree2">
                                        САЙТТАН ҚАЛАЙ ТӨЛЕМ ЖАСАУҒА БОЛАДЫ?
                                    </button>
                                </h2>
                                <div id="collapseThree2" class="accordion-collapse collapse" aria-labelledby="headingThree2" data-bs-parent="#accordionExamplec3" style="">
                                    <div class="accordion-body card-body">
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
                        </div>
                    </div>
                </div>
            </div>
            <?php else: ?>
                <div class="col-lg-6">
                    <div class="rbt-accordion-style accordion">
                        <div class="section-title text-start mb--60">
                            <h4 class="title">Олимпиада</h4>
                        </div>
                        <div class="rbt-accordion-style rbt-accordion-04 accordion">
                            <div class="accordion" id="faqs-accordionExamplec3">
                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="faqs-headingThree1">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-collapseThree1" aria-expanded="true" aria-controls="faqs-collapseThree1">
                                            ЧТО ДЕЛАТЬ ПРИ  ВОЗНИКНОВЕНИИ  ТРУДНОСТЕЙ  С  ОПЛАТОЙ  ВЗНОСА ЧЕРЕЗ  САЙТ  ДЛЯ УЧАСТИЯ В ОЛИМПИАДЕ?
                                        </button>
                                    </h2>

                                    <div id="faqs-collapseThree1" class="accordion-collapse collapse show" aria-labelledby="faqs-headingThree1" data-bs-parent="#faqs-accordionExamplec3" style="">
                                        <div class="accordion-body card-body">
                                            <p>
                                                Необходимо совершить перевод по ссылке <a href="https://pay.kaspi.kz/pay/lzlvssh5">https://pay.kaspi.kz/pay/lzlvssh5</a>
                                                оплатив 500тг, платежный чек и ИИН участника Олимпиады отправить на один из нижеуказанных номеров через приложение WhatsApp.
                                                <a href="https://wa.me/77754243727">https://wa.me/77754243727</a>
                                                <a href="https://wa.me/77754037284">https://wa.me/77754037284</a>
                                                После получения ответа «ЗАРЕГИСТРИРОВАНО» появится доступ к участию.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="faqs-headingThree2">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-collapseThree2" aria-expanded="false" aria-controls="faqs-collapseThree2">
                                            ВОЗМОЖНО ЛИ ОПЛАТИВ ЧЕРЕЗ САЙТ, ПРИСТУПИТЬ К ВЫПОЛНЕНИЮ  ЗАДАНИЙ  ОЛИМПИАДЫ  В  ДРУГОЕ  ВРЕМЯ?
                                        </button>
                                    </h2>
                                    <div id="faqs-collapseThree2" class="accordion-collapse collapse" aria-labelledby="faqs-headingThree2" data-bs-parent="#faqs-accordionExamplec3">
                                        <div class="accordion-body card-body">
                                            <p>
                                                Нет, нельзя. После совершения оплаты сразу  открываются задания олимпиады.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="faqs-headingThree11">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-collapseThree11" aria-expanded="false" aria-controls="faqs-collapseThree11">
                                            ПОЛУЧИЛ(А) ОТВЕТ «ВЗНОС ПРИНЯТ», «ЗАРЕГИСТРИРОВАНО», ОДНАКО НА САЙТЕ ВЫСВЕЧИВАЕТ СТРАНИЦА «СОВЕРШИТЬ ОПЛАТУ». ЧТО МОЖНО СДЕЛАТЬ?
                                        </button>
                                    </h2>
                                    <div id="faqs-collapseThree11" class="accordion-collapse collapse" aria-labelledby="faqs-headingThree11" data-bs-parent="#faqs-accordionExamplec11">
                                        <div class="accordion-body card-body">
                                            <p>
                                                Сравните ИИН при регистрации и ИИН при заполнении анкеты. С ошибочно указанным ИИН, Вы не можете принять участие.
                                                Если таковых расхождений не имеется, то следует проверить, повторно отправив ЧЕК+ИИН  на номер через приложение WhatsApp
                                                <a href="https://wa.me/77754243727">https://wa.me/77754243727</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="faqs-headingThree4">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-collapseThree4" aria-expanded="false" aria-controls="faqs-collapseThree4">
                                            МОГУ ЛИ ПРОДОЛЖИТЬ ЛИБО ПЕРЕСДАТЬ, В СЛУЧАЕ ВЫХОДА ИЗ САЙТА ПРИ ВЫПОЛНЕНИИ ЗАДАНИЙ ОЛИМПИАДЫ?
                                        </button>
                                    </h2>
                                    <div id="faqs-collapseThree4" class="accordion-collapse collapse" aria-labelledby="faqs-headingThree4" data-bs-parent="#faqs-accordionExamplec3">
                                        <div class="accordion-body card-body">
                                            <p>
                                                Да, Вы сможете. Но тестовые задания начнутся с самого начала. Нажмите кнопку ниже, чтобы вернуться к заданию.
                                            </p>
                                            <a class="rbt-btn" href="<?= Url::to(['olympiad/check-test']) ?>">Олимпиаданы жалғастыру</a>
                                        </div>
                                    </div>
                                </div>


                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="faqs-headingThree5">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-collapseThree5" aria-expanded="false" aria-controls="faqs-collapseThree5">
                                            ЧТО МНЕ ДЕЛАТЬ, ЕСЛИ Я НЕ СМОГ(ЛА) ЗАГРУЗИТЬ ДИПЛОМ ИЛИ СЕРТИФИКАТ   РЕЗУЛЬТАТОВ  ОЛИМПИАДЫ?
                                        </button>
                                    </h2>
                                    <div id="faqs-collapseThree5" class="accordion-collapse collapse" aria-labelledby="faqs-headingThree5" data-bs-parent="#faqs-accordionExamplec3">
                                        <div class="accordion-body card-body">
                                            <p>
                                                Если Вы не смогли или не успели  загрузить Диплом, Сертификат, Благодарственное письмо, нажмите на нижнюю  кнопку.
                                                <br>
                                                <a class="rbt-btn" href="<?= Url::to(['olympiad/check-cert']) ?>">Сертификат/Диплом скачать</a>
                                                <br><br>
                                                <a class="rbt-btn" href="<?= Url::to(['olympiad/check-cert-thank-leader']) ?>">Грамота Мұғалім скачать</a>
                                                <br><br>
                                                <a class="rbt-btn" href="<?= Url::to(['olympiad/check-cert-thank-parent']) ?>">Алғыс хат Ата-Ана скачать</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="faqs-headingThree6">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-collapseThree6" aria-expanded="false" aria-controls="faqs-collapseThree6">
                                            ЧТО ДЕЛАТЬ, ЕСЛИ ИМЕЕТСЯ ОШИБКА В  ДИПЛОМЕ ИЛИ СЕРТИФИКАТЕ ?
                                        </button>
                                    </h2>
                                    <div id="faqs-collapseThree6" class="accordion-collapse collapse" aria-labelledby="faqs-headingThree6" data-bs-parent="#faqs-accordionExamplec3">
                                        <div class="accordion-body card-body">
                                            <p>
                                                Для исправления ошибок необходимо письменно обратиться  через  приложение  WhatsApp: по номеру
                                                <a href="https://wa.me/77754037284">https://wa.me/77754037284</a>
                                                со следующим текстом: «В моем наградном листе допущена ошибка  (в скобках  указать правильный и безошибочный вариант) . Прошу Вас помочь в  решении данного вопроса». Напишите свой  ИИН. Вам будет направлена  ссылка  исправленного варианта наградного листа.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="faqs-headingThree7">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-collapseThree7" aria-expanded="false" aria-controls="faqs-collapseThree7">
                                            КОГДА И КАКИМ ОБРАЗОМ МОЖНО ПОДАТЬ НА АПЕЛЛЯЦИЮ?
                                        </button>
                                    </h2>
                                    <div id="faqs-collapseThree7" class="accordion-collapse collapse" aria-labelledby="faqs-headingThree7" data-bs-parent="#faqs-accordionExamplec3">
                                        <div class="accordion-body card-body">
                                            <p>
                                                Апелляционные жалобы принимаются до 18.00 часов  следующего дня  после завершения  Олимпиады.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="faqs-headingThree8">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-collapseThree8" aria-expanded="false" aria-controls="faqs-collapseThree8">
                                            УКАЖИТЕ КОНТАКТНЫЕ НОМЕРА.
                                        </button>
                                    </h2>
                                    <div id="faqs-collapseThree8" class="accordion-collapse collapse" aria-labelledby="faqs-headingThree8" data-bs-parent="#faqs-accordionExamplec3">
                                        <div class="accordion-body card-body">
                                            <p>
                                                По Олимипиаде: <a href="https://wa.me/77754243727">https://wa.me/77754243727</a>,
                                                <a href="https://wa.me/77754037284">https://wa.me/77754037284</a>
                                                <br>
                                                По вопросам публикации материала: <a href="https://wa.me/77786252078">https://wa.me/77786252078</a>
                                                Необходимо спокойно дождаться  обратной связи. Из-за большого количества обращений,  обязательно всем ответят в течение 24 часов.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="faqs-headingThree9">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-collapseThree9" aria-expanded="false" aria-controls="faqs-collapseThree9">
                                            МОЖНО ЛИ УЗНАТЬ ЧАСЫ РАБОТЫ?
                                        </button>
                                    </h2>
                                    <div id="faqs-collapseThree9" class="accordion-collapse collapse" aria-labelledby="faqs-headingThree9" data-bs-parent="#faqs-accordionExamplec3">
                                        <div class="accordion-body card-body">
                                            <p>
                                                Время работы: с 09.00 до 19.00 часов.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="rbt-accordion-style accordion">
                        <div class="section-title text-start mb--60">
                            <h4 class="title">Материалная база</h4>
                        </div>
                        <div class="rbt-accordion-style rbt-accordion-04 accordion">
                            <div class="accordion" id="accordionExamplec3">
                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="headingThree1">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree1" aria-expanded="false" aria-controls="collapseThree1">
                                            КАК МОЖНО ПОЛУЧИТЬ СЕРТИФИКАТ ИЛИ ГРАМОТУ В СЛУЧАЕ ИХ НЕЗАГРУЗКИ ПРИ  ПУБЛИКАЦИИ  МАТЕРИАЛА?
                                        </button>
                                    </h2>
                                    <div id="collapseThree1" class="accordion-collapse collapse" aria-labelledby="headingThree1" data-bs-parent="#accordionExamplec3" style="">
                                        <div class="accordion-body card-body">
                                            <p>
                                                Если Вы не смогли или не успели загрузить Диплом, Сертификат, Благодарственное письмо, нажмите на нижнюю  кнопку. По интересующим Вас другим дополнительным  вопросам, можете письменно обратиться через приложение WhatsApp по номеру:
                                                <a href="https://wa.me/77786252078">https://wa.me/77786252078</a>
                                            </p>
                                            <br>
                                            <a class="rbt-btn" href="<?= Url::to(['article/check-cert']) ?>">Сертифика қайта жүктеу</a>
                                            <br><br>
                                            <a class="rbt-btn" href="<?= Url::to(['article/check-charter']) ?>">Грамота қайта жүктеу</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="headingThree2">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree2" aria-expanded="false" aria-controls="collapseThree2">
                                            КАК ПРОИЗВЕСТИ ОПЛАТУ ЧЕРЕЗ САЙТ?
                                        </button>
                                    </h2>
                                    <div id="collapseThree2" class="accordion-collapse collapse" aria-labelledby="headingThree2" data-bs-parent="#accordionExamplec3" style="">
                                        <div class="accordion-body card-body">
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
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
