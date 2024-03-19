<?php

use common\models\ArticleMagazine;
use kartik\file\FileInput;
use kartik\select2\Select2;
use kartik\form\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\MaskedInput;

/* @var $this \yii\web\View */
/* @var $model \common\models\Article */
/* @var $articleMagazine \common\models\ArticleMagazine */

$this->title = Yii::t('app', 'Опубликовать материал');
?>
<div class="bg-gradient-13 pt--60 pb--60">
    <div class="container">
        <h1><?= $this->title ?></h1>

        <div class="mb--30">
            <?php if (Yii::$app->language === 'kz'): ?>
                <div>
                    <p>
                        СӘЛЕМЕТСІЗ БЕ, ҚҰРМЕТТІ  ПЕДАГОГ!
                    </p>
                    <p>
                        Сіз «Білім шыңы-Ғылым сыры» журналының BILIM-SHINI.KZ электронды сайтында
                        2  материал  жариялап, портфолиоға 100% жарамды QR кодталған
                        Сертификат пен Грамотаны небәрі 2 минутта жүктеп алуыңызға болады.
                    </p>
                    <p>
                        «Білім шыңы-Ғылым сыры» журналы ҚР Инвестициялар және Даму Министрлігінің
                        Байланыс, Ақпараттандыру және Ақпарат комитетіне тіркелген.
                        Тіркеу куәлігі №15454-Ж (01.07.2015)
                    </p>
                </div>
                <div class="mt--30">
                    <div id="toggleBtn" class="rbt-btn btn-gradient w-100" style="cursor: pointer">Толығырақ</div>
                    <div id="toggleText" style="display: none">
                        <p class="mt-4">
                            САЙТТА МАТЕРИАЛ ЖАРИЯЛАУ ТӘРТІБІ:
                        </p>
                        <p>
                            1. Анкетаны толық әрі қатесіз толтырыңыз.
                        </p>
                        <p>
                            2. Дайындаған материалыңызды жүктеңіз
                        </p>
                        <p>
                            3. Төлем бетіне өтіңіз. (Материал жариялау жарнасы – 3000 тг.)
                        </p>
                        <p>
                            4. Сайтта отырып өзіңізде бар ТӨЛЕМ картамен төлей аласыз.
                        </p>
                        <p>
                            5. Сертификат пен Грамота жүктеп аласыз. Егер жүктеп үлгермесеңіз немесе қайта жүктеу қажет болса, КӨМЕК бөлімінде сақталады.
                        </p>
                        <p>
                            6. Егер сайтта төлем жасау қиындық туғызса, 8775 076 78 76 Бахыткүл Е. КАСПИЙ ГОЛД номеріне жарнаны аударып, төлем чек пен ЖСН-ді вадсап номеріне жібересіз. Сіздің ЖСН-ңіз базаға тіркейміз. «Тіркелді» деген жауап алғаннан кейін https://bilimshini.kz/kz сілтемесімен сайтқа қайта кіріп, материал жүктеп, Сертификат пен Грамотаны ала беруіңізге болады.
                        </p>
                        <p>
                            <b>СҰРАҚТАРЫҢЫЗ БОЛСА</b>
                            <br>Whatsapp номерлер:
                            <br><a href="https://wa.me/77786252078">https://wa.me/77786252078</a>
                            <br><a href="https://wa.me/77750767876">https://wa.me/77750767876</a>
                        </p>
                    </div>
                </div>
            <?php else: ?>
                <p>
                    В разделе "Публикация" - вы можете найти планы уроков, открытые уроки и учебные часы, и другие документы, необходимые учителям.
                </p>
                <p>
                    <b>ЗДРАВСТВУЙ, УВАЖАЕМЫЙ ПЕДАГОГ!</b><br>
                <p>
                    Вы можете получить Сертификат со 100% действительным для портфолио QR-кодом, опубликовав свой материал на сайте электронного журнала «Білім шыңы-Ғылым сыры»
                </p>
                <p>
                    Ваш материал будет включен в базу данных ПУБЛИКАЦИИ МАТЕРИАЛОВ нашего сайта, что создаст площадку для практики учителей
                </p>
                <a id="toggleBtn" style="color: blue; cursor: pointer" href="#">Подробнее </a>
                </p>
                <div id="toggleText" style="display: none">
                    <p><b>УСЛОВИЯ ПУБЛИКАЦИИ МАТЕРИАЛОВ:</b></p>
                    <p>
                        1. Анкетаны толық әрі қатесіз толтырыңыз.
                    </p>
                    <p>
                        2. Дайындаған материалыңызды жүктеңіз
                    </p>
                    <p>
                        3. Төлем бетіне өтіңіз. (Материал жариялау жарнасы – 3000 тг.)
                    </p>
                    <p>
                        4. Сайтта отырып өзіңізде бар ТӨЛЕМ картамен төлей аласыз.
                    </p>
                    <p>
                        5. Сертификат пен Грамота жүктеп аласыз. Егер жүктеп үлгермесеңіз немесе қайта жүктеу қажет болса, КӨМЕК бөлімінде сақталады.
                    </p>
                    <p>
                        6. Егер сайтта төлем жасау қиындық туғызса, 8775 076 78 76 Бахыткүл Е. КАСПИЙ ГОЛД номеріне жарнаны аударып, төлем чек пен ЖСН-ді вадсап номеріне жібересіз. Сіздің ЖСН-ңіз базаға тіркейміз. «Тіркелді» деген жауап алғаннан кейін https://bilimshini.kz/kz сілтемесімен сайтқа қайта кіріп, материал жүктеп, Сертификат пен Грамотаны ала беруіңізге болады.
                    </p>
                    <p>
                        По дополнительным вопросам на Whatsapp:
                        <br>
                        <br><a href="https://wa.me/77786252078">https://wa.me/77786252078</a>
                        <br>
                        <br><a href="https://wa.me/77083176516">https://wa.me/77083176516</a>
                    </p>
                </div>
            <?php endif; ?>
        </div>

        <?php $form = ActiveForm::begin() ?>

        <div class="row">
            <div class="col-md-3">
                <?= $form->field($model, 'article_magazine_id')->dropDownList(ArrayHelper::map(ArticleMagazine::find()->all(), 'id', 'name')) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <?= $form->field($model, 'surname') ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'name') ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'patronymic') ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <?= $form->field($model, 'iin') ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'phone')->widget(MaskedInput::className(), [
                    'mask' => '+7(999)999-99-99',
                    'clientOptions' => [
                        'removeMaskOnSubmit' => true
                    ],
                    'options' => [
                        'autofocus' => true
                    ]
                ]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <?= $form->field($model, 'subject_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\common\models\Subject::find()->andWhere(['type' => \common\models\Subject::TYPE_ARTICLE])->asArray()->all(), 'id', Yii::$app->language === 'ru' ? 'name_ru' : 'name_kz'),
                    'options' => ['placeholder' => Yii::t('app', 'Укажите предмет')],
                ]) ?>
            </div>
            <div class="col-md-9">
                <?= $form->field($model, 'topic') ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <?= $form->field($model, 'region_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\common\models\Region::find()->asArray()->all(), 'id', 'name'),
                    'options' => ['placeholder' => Yii::t('app', 'Укажите регион')],
                ]) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'city_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\common\models\City::find()->asArray()->all(), 'id', 'name'),
                    'options' => ['placeholder' => Yii::t('app', 'Укажите город')],
                ]) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'school_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\common\models\School::find()->asArray()->all(), 'id', 'name'),
                    'options' => ['placeholder' => Yii::t('app', 'Укажите школу')],
                ]) ?>
            </div>
        </div>

        <?php if ($articleMagazine->type === ArticleMagazine::TYPE_STUDENT): ?>
        <div class="row">
            <div class="col-md-3">
                <?= $form->field($model, 'grade')->dropDownList([
                    1 => '1',
                    2 => '2',
                    3 => '3',
                    4 => '4',
                    5 => '5',
                    6 => '6',
                    7 => '7',
                    8 => '8',
                    9 => '9',
                    10 => '10',
                    11 => '11',
                ], [
                    'prompt' => Yii::t('app', 'Выберите класс')
                ]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'lead_name') ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'fileTemp')->widget(FileInput::classname(), [
                    'options' => [
                        'accept' => 'document/*'
                    ],
                    'pluginOptions' => [
                        'theme' => 'fa',
                        'showCaption' => false,
                        'showUpload' => false,
                        'browseLabel' =>  Yii::t('app', 'Загрузить')
                    ],
                ]) ?>
            </div>
        </div>

        <p class="mt--10">
            <?php if (Yii::$app->language === 'ru'): ?>
                Отправляя данные вы соглашаетесь с условиями <a style="color: red" href="<?= '/file/offer.pdf' ?>" target="_blank">публичной оферты</a>
            <?php else: ?>
                Мәліметтерді жібере отырып, <a style="color: red" href="<?= '/file/offer.pdf' ?>" target="_blank">келісімді</a> мақұлдайсыз
            <?php endif; ?>
        </p>

        <?= Html::submitButton(Yii::t('app', 'Сохранить/Оплатить'), ['class' => 'rbt-btn']) ?>

        <?php ActiveForm::end() ?>

    </div>
</div>
<?php
$js =<<<JS
$('#article-region_id').change(function() {
  $.get({
    url: '/kz/site/get-cities',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#article-city_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});

$('#article-city_id').change(function() {
  $.get({
    url: '/kz/site/get-schools',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#article-school_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});

$('#toggleBtn').click(function() {
  $('#toggleText').toggle('ease');
});
JS;


$this->registerJs($js);
?>
