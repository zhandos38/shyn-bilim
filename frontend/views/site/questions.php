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
        <div class="text-center">
            https://bilim-shini.kz/kz Сайтында МАТЕРИАЛ ЖАРИЯЛАУ немесе
            <br> ОЛИМПИАДАҒА ҚАТЫСУ барысында мәселелер туындаса, төмендегі
            <br> КӨМЕК құралы Сізге көмектесе алады.
        </div>
        <?php if (Yii::$app->language === 'kz'): ?>
            <div class="accordion" id="accordionExample" style="margin-top: 2rem">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            1. Сұрақ: МАТЕРИАЛ ЖАРИЯЛАУ барысында Сертификат немесе Грамота жүктей алмай қалған жағдайда қалай алуыма болады?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Жауап: Егер Сіз Дипломды, Сертификатты, Алғыс хатты жүктей алмай қалсаңыз төмендегі батырманы басыңыз. Қосымша сұрақтарыңыз болса: https://wa.me/77786252078 WhatsApp номеріне жазасыз.
                            <br>
                            <a class="btn btn-primary" href="<?= Url::to(['article/check-cert']) ?>">Сертифика қайта жүктеу</a>
                            <br><br>
                            <a class="btn btn-primary" href="<?= Url::to(['article/check-charter']) ?>">Грамота қайта жүктеу</a>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            2. Сұрақ: Сайттан қалай төлем жасауға болады?
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
                            3. Сұрақ: Олимпиада жарнасын сайттан төлем жасай алмаған жағдайда не істеймін?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Жауап: Сайттан төлем жасау қиындық туғызған жағдайда 8775 076 78 76 Бахыткүл  каспий голд номеріне төлем жасап, төлем чекті және қатысушы оқушының ЖСН-ін төмендегі вадсап номерлердің біріне ғана жіберу керек.
                                <br> <a href="https://wa.me/77013129906">https://wa.me/77013129906</a>
                                <br> <a href="https://wa.me/77754037284">https://wa.me/77754037284</a>
                                <br>«ТІРКЕЛДІ» деген жауап алғаннан кейін олимпиадаға қатысуға болады.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            4. Сұрақ: Сайттан төлем жасап қойып, олимпиада тапсырмасын басқа уақытта орындауға болама?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Жауап:  Жоқ, болмайды. Төлем жасалғаннан кейін тапсырма бірден ашылады.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSix">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            5. Сұрақ: Жарна төленді. «Тіркелді» деген жауап алдым. Бірақ сайтта «Төлем жасау» беті  шығып тұр. Не істеуге болады?
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Жауап: Сіз тіркеткен ЖСН-ді анкетаға жазған ЖСН-мен салыстырып көріңіз. Қате ЖСН-мен қатыса алмайсыз. Егер ондай қателік болмаса,  тексеру https://wa.me/77013129906 осы ватсап номерге ЧЕК+ЖСН қайта жіберіңіз.
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
                                Жауап:  Иә, тапсыра аласыз. Бірақ тест тапсырмалары басынан басталады. Тапсырмаға қайта кіру үшін төмендегі батырманы басыңыз.
                                <a class="btn btn-primary" href="<?= Url::to(['olympiad/check-test']) ?>">Олимпиаданы жалғастыру</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingEight">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                            7. Сұрақ: Олимпиада нәтижесі бойынша Дипломды немесе Сертификатты жүктей алмай қалған жағдайда не істеймін?
                        </button>
                    </h2>
                    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Жауап:  Егер Сіз Дипломды, Сертификатты, Алғыс хатты жүктей алмай қалсаңыз, төмендегі батырманы басыңыз.
                                <br>
                                <a class="btn btn-primary" href="<?= Url::to(['olympiad/check-cert']) ?>">Сертификат/Диплом қайта жүктеу</a>
                                <br><br>
                                <a class="btn btn-primary" href="<?= Url::to(['olympiad/check-cert-thank-leader']) ?>">Грамота Мұғалім үшін жүктеу</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingNine">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                            8. Сұрақ: Диплом  немесе Сертификатта қате болған жағдайда не істеймін?
                        </button>
                    </h2>
                    <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Жауап: Қатені жөндеу үшін https://wa.me/77013129906 ватсап номеріне жазасыз: «Менің марапат қағазымда (осы жақша ішіне қалай дұрыстау керектігін жазыңыз) қателік кетіп қалды. Дұрыстап алуға сіздердің көмектеріңіз қажет» деп, ЖСН-ңізді  қоса жазыңыз. Сізге, дұрысталғын марапат қағазының сілтемесі жіберіледі.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTen">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                            9. Сұрақ: Апелляцияға қашан-қалай беруге болады?
                        </button>
                    </h2>
                    <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Жауап: Апелляциялық шағымдар олимпиада аяқталған күннің ертесіне 18.00-ге дейін қабылданады.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingEleven">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                            10. Сұрақ: Байланыс номерлері қажет.
                        </button>
                    </h2>
                    <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Жауап:  Олимипиадалар бойынша:
                                <br> <a href="https://wa.me/77013129906">https://wa.me/77013129906</a>
                                <br> <a href="https://wa.me/77754037284">https://wa.me/77754037284</a>
                                <br> Материал жариялау бойынша:
                                <br> <a href="https://wa.me/77786252078">https://wa.me/77786252078</a>
                                <br> Кері байланысты сабырмен күтесіздер. 24 сағат ішінде жауап беріледі.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwelve">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                            11. Сұрақ: Жұмыс уақытын білуге бола ма?
                        </button>
                    </h2>
                    <div id="collapseTwelve" class="accordion-collapse collapse" aria-labelledby="headingTwelve" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Жауап: Жұмыс уақыты: 9.00-19.00 сағат аралығы.
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
                            1. Вопрос: Как можно получить Сертификат или Грамоту в случае их незагрузки при  ПУБЛИКАЦИИ  МАТЕРИАЛА?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Ответ:  Если Вы не смогли или не успели загрузить Диплом, Сертификат, Благодарственное письмо, нажмите на нижнюю  кнопку. По интересующим Вас другим дополнительным  вопросам, можете письменно обратиться через приложение WhatsApp по номеру: https://wa.me/77786252078.
                                <br>
                                <a class="btn btn-primary" href="<?= Url::to(['article/check-cert']) ?>">Скачать сертификат</a>
                                <br><br>
                                <a class="btn btn-primary" href="<?= Url::to(['article/check-charter']) ?>">Скачать грамоту</a>
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
                            3. Вопрос: Что делать при  возникновении  трудностей  с  оплатой  взноса через  сайт  для участия в Олимпиаде  ?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Ответ: Необходимо совершить перевод через Каспий голд по номеру  8775 076 78 76 Бахыткүл, платежный чек и ИИН участника Олимпиады отправить на один из нижеуказанных номеров через приложение WhatsApp.
                                <br> <a href="https://wa.me/77013129906">https://wa.me/77013129906</a>
                                <br> <a href="https://wa.me/77754037284">https://wa.me/77754037284</a>
                                <br> После получения ответа «ЗАРЕГИСТРИРОВАНО» имеется доступ к участию.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            4. Вопрос: Возможно ли оплатив через сайт, приступить к выполнению  заданий  олимпиады  в  другое  время?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Ответ:  Нет, нельзя. После совершения оплаты сразу  открываются задания олимпиады.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSix">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            5. Вопрос: Получил(а)  ответ «Взнос  принят», «Зарегистрировано», однако на сайте высвечивает страница «Совершить оплату». Что можно сделать?
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Ответ: Сравните ИИН при регистрации и ИИН при заполнении анкеты.  С  ошибочно указанным  ИИН, Вы не можете принять участие.  Если таковых  расхождений не имеется, то следует проверить, повторно отправив ЧЕК+ИИН  на номер через приложение WhatsApp  https://wa.me/77013129906
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSeven">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            6. Вопрос: Могу ли продолжить либо пересдать,  в случае  выхода из сайта при  выполнении заданий Олимпиады?
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Ответ: Иә, тапсыра аласыз. Бірақ тест тапсырмалары басынан басталады. Тапсырмаға қайта кіру үшін төмендегі батырманы басыңыз.
                                <a class="btn btn-primary" href="<?= Url::to(['olympiad/check-test']) ?>">Продолжить олимпиаду</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingEight">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                            7. Вопрос: Иә, тапсыра аласыз. Бірақ тест тапсырмалары басынан басталады. Тапсырмаға қайта кіру үшін төмендегі батырманы басыңыз.
                        </button>
                    </h2>
                    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Ответ: Если Вы не смогли или не успели  загрузить Диплом, Сертификат, Благодарственное письмо, нажмите на нижнюю  кнопку.
                                <br>
                                <a class="btn btn-primary" href="<?= Url::to(['olympiad/check-cert']) ?>">Сертификат/Диплом скачать</a>
                                <br><br>
                                <a class="btn btn-primary" href="<?= Url::to(['olympiad/check-cert-thank-leader']) ?>">Грамота для руководителя скачать</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingNine">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                            8. Вопрос: Что делать, если имеется ошибка в  Дипломе или Сертификате?
                        </button>
                    </h2>
                    <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Ответ:  Для исправления ошибок необходимо письменно обратиться  через  приложение  WhatsApp: по номеру   https://wa.me/77013129906  со следующим текстом: «В моем наградном листе допущена ошибка  (в скобках  указать правильный и безошибочный вариант) . Прошу Вас помочь в  решении данного вопроса». Напишите свой  ИИН. Вам будет направлена  ссылка  исправленного варианта наградного листа.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTen">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                            9. Вопрос: Когда и каким образом можно подать на апелляцию?
                        </button>
                    </h2>
                    <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Ответ: Апелляционные жалобы принимаются до 18.00 часов  следующего дня  после завершения  Олимпиады.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingEleven">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                            10. Вопрос: Укажите контактные номера.
                        </button>
                    </h2>
                    <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Ответ: по Олимипиаде:
                                <br><a href="https://wa.me/77013129906">https://wa.me/77013129906</a>
                                <br><a href="https://wa.me/77754037284">https://wa.me/77754037284</a>
                                <br>по вопросам публикации материала: <a href="https://wa.me/77786252078">https://wa.me/77786252078</a>
                                <br>Необходимо спокойно дождаться  обратной связи. Из-за большого количества обращений,  обязательно всем ответят в течение 24 часов.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwelve">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                            11. Вопрос: Можно ли узнать часы работы?
                        </button>
                    </h2>
                    <div id="collapseTwelve" class="accordion-collapse collapse" aria-labelledby="headingTwelve" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Ответ: Время работы: с 09.00 до 19.00 часов.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
