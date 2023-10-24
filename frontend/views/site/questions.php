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
                        <li class="rbt-breadcrumb-item"><a href="index.html">Басты бет</a></li>
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
                                        МАТЕРИАЛ ЖАРИЯЛАУ барысында Сертификат немесе Грамота жүктей алмай қалған жағдайда қалай алуыма болады?
                                    </button>
                                </h2>
                                <div id="collapseThree1" class="accordion-collapse collapse" aria-labelledby="headingThree1" data-bs-parent="#accordionExamplec3" style="">
                                    <div class="accordion-body card-body">
                                        <p>
                                            Жауап: Егер Сіз Дипломды, Сертификатты, Алғыс хатты жүктей алмай қалсаңыз төмендегі батырманы басыңыз. Қосымша сұрақтарыңыз болса: https://wa.me/77786252078 WhatsApp номеріне жазасыз.
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
                                        Сайттан қалай төлем жасауға болады?
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
                                        Олимпиада жарнасын сайттан төлем жасай алмаған жағдайда не істеймін?
                                    </button>
                                </h2>

                                <div id="faqs-collapseThree1" class="accordion-collapse collapse show" aria-labelledby="faqs-headingThree1" data-bs-parent="#faqs-accordionExamplec3" style="">
                                    <div class="accordion-body card-body">
                                        <p>
                                            Жауап: Сайттан төлем жасау қиындық туғызған жағдайда 8(775) 076-78-76 Бахыткүл каспий голд номеріне төлем жасап, төлем чекті және қатысушы ЖСН-ін мына ватсапқа жіберу керек.
                                            <br><a href="https://wa.me/77754037284">https://wa.me/77754037284</a>
                                            <br>«ТІРКЕЛДІ» деген жауап алғаннан кейін олимпиадаға қатысуға болады.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="faqs-headingThree2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-collapseThree2" aria-expanded="false" aria-controls="faqs-collapseThree2">
                                        Сайттан төлем жасап қойып, олимпиада тапсырмасын басқа уақытта орындауға болама?
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
                                <h2 class="accordion-header card-header" id="faqs-headingThree3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-collapseThree3" aria-expanded="false" aria-controls="faqs-collapseThree3">
                                        Жарна төленді. «Тіркелді» деген жауап алдым. Бірақ сайтта «Төлем жасау» беті  шығып тұр. Не істеуге болады?
                                    </button>
                                </h2>
                                <div id="faqs-collapseThree3" class="accordion-collapse collapse" aria-labelledby="faqs-headingThree3" data-bs-parent="#faqs-accordionExamplec3">
                                    <div class="accordion-body card-body">
                                        <p>
                                            Жауап: Сіз тіркеткен ЖСН-ді анкетаға жазған ЖСН-мен салыстырып көріңіз. Қате ЖСН-мен қатыса алмайсыз. Егер ондай қателік болмаса, тексеру
                                            <a href="https://wa.me/77754037284">https://wa.me/77754037284</a> осы ватсап номерге ЧЕК+ЖСН қайта жіберіңіз.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="faqs-headingThree4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-collapseThree4" aria-expanded="false" aria-controls="faqs-collapseThree4">
                                        Олимпиада тапсырмаларын орындап отырып сайттан шығып кеткен жағдайда қайтадан тапсыра аламын ба?
                                    </button>
                                </h2>
                                <div id="faqs-collapseThree4" class="accordion-collapse collapse" aria-labelledby="faqs-headingThree4" data-bs-parent="#faqs-accordionExamplec3">
                                    <div class="accordion-body card-body">
                                        <p>
                                            Иә, тапсыра аласыз. Бірақ тест тапсырмалары басынан басталады. Тапсырмаға қайта кіру үшін төмендегі батырманы басыңыз.
                                            <a class="rbt-btn" href="<?= Url::to(['olympiad/check-test']) ?>">Олимпиаданы жалғастыру</a>
                                        </p>
                                    </div>
                                </div>
                            </div>


                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="faqs-headingThree5">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-collapseThree5" aria-expanded="false" aria-controls="faqs-collapseThree5">
                                        Олимпиада нәтижесі бойынша Дипломды немесе Сертификатты жүктей алмай қалған жағдайда не істеймін?
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
                                        Диплом  немесе Сертификатта қате болған жағдайда не істеймін?
                                    </button>
                                </h2>
                                <div id="faqs-collapseThree6" class="accordion-collapse collapse" aria-labelledby="faqs-headingThree6" data-bs-parent="#faqs-accordionExamplec3">
                                    <div class="accordion-body card-body">
                                        <p>
                                            Жауап: Қатені жөндеу үшін <a href="https://wa.me/77754037284">https://wa.me/77754037284</a> ватсап номеріне жазасыз: «Менің марапат қағазымда (осы жақша ішіне қалай дұрыстау керектігін жазыңыз) қателік кетіп қалды. Дұрыстап алуға сіздердің көмектеріңіз қажет» деп, ЖСН-ңізді қоса жазыңыз. Сізге, дұрысталғын марапат қағазының сілтемесі жіберіледі.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="faqs-headingThree7">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-collapseThree7" aria-expanded="false" aria-controls="faqs-collapseThree7">
                                        Апелляцияға қашан-қалай беруге болады?
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
                                        Байланыс номерлері қажет.
                                    </button>
                                </h2>
                                <div id="faqs-collapseThree8" class="accordion-collapse collapse" aria-labelledby="faqs-headingThree8" data-bs-parent="#faqs-accordionExamplec3">
                                    <div class="accordion-body card-body">
                                        <p>
                                            Олимипиадалар бойынша ватсапқа жазасыз:
                                            <br><a href="https://wa.me/77754037284">https://wa.me/77754037284</a>

                                            <br>Журналға материал жариялау бойынша:
                                            <br><a href="https://wa.me/77786252078">https://wa.me/77786252078</a>
                                            <br>Кері байланысты сабырмен күтесіздер. 24 сағат ішінде жауап беріледі.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="faqs-headingThree9">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-collapseThree9" aria-expanded="false" aria-controls="faqs-collapseThree9">
                                        Жұмыс уақытын білуге бола ма?
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
        </div>
    </div>
</div>
