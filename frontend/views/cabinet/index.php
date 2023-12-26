<?php

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $model \frontend\models\ProfileForm */
?>
<div class="my-account-section bg-color-white rbt-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row g-5">
                    <!-- My Account Tab Menu Start -->
                    <div class="col-lg-3 col-12">
                        <?= $this->render('_tabs') ?>
                    </div>
                    <!-- My Account Tab Menu End -->

                    <!-- My Account Tab Content Start -->
                    <div class="col-lg-9 col-12">
                        <div class="tab-content" id="myaccountContent">
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade active show" id="dashboad" role="tabpanel">
                                <div class="rbt-my-account-inner">
                                    <h3>Профиль</h3>

                                    <div class="about-address mb--20">
                                        <p>Сәлеметсізбе, <strong><?= Yii::$app->user->identity->name ?></strong>
                                    </div>

                                    <p>Бұл сіздің жеке кабинетіңіз</p>

                                    <p>Жазылу уақыты (дейін): <?= Yii::$app->user->identity->subscribe_until ?? 'Жазылмағансыз' ?></p>

                                    <p>Материал жариялау лимиті: <?= Yii::$app->user->identity->article_count ?></p>

                                    <?php if (Yii::$app->language === 'ru'): ?>
                                        Отправляя данные вы соглашаетесь с условиями <a style="color: red" href="<?= '/file/offer.pdf' ?>" target="_blank">публичной оферты</a>
                                    <?php else: ?>
                                        Мәліметтерді жібере отырып, <a style="color: red" href="<?= '/file/offer.pdf' ?>" target="_blank">қоғамдық ұсыныспен</a> келісесіз
                                    <?php endif; ?>

                                    <a class="rbt-btn btn-gradient rbt-switch-btn w-100" data-text="Жазылу" href="<?= \yii\helpers\Url::to(['site/subscribe']) ?>">Жазылу</a>

                                    <br>

                                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                                    <div class="row mt--30">
                                        <div class="col-md-4">
                                            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                                        </div>
                                        <div class="col-md-4">
                                            <?= $form->field($model, 'surname') ?>
                                        </div>
                                        <div class="col-md-4">
                                            <?= $form->field($model, 'patronymic') ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?= $form->field($model, 'region_id')->widget(Select2::classname(), [
                                                'data' => ArrayHelper::map(\common\models\Region::find()->asArray()->all(), 'id', 'name'),
                                                'options' => ['placeholder' => Yii::t('app', 'Укажите регион')],
                                            ]) ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?= $form->field($model, 'city_id')->widget(Select2::classname(), [
                                                'data' => ArrayHelper::map(\common\models\City::find()->asArray()->all(), 'id', 'name'),
                                                'options' => ['placeholder' => Yii::t('app', 'Укажите город')],
                                            ]) ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?= $form->field($model, 'address') ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?= $form->field($model, 'school_id')->widget(Select2::classname(), [
                                                'data' => ArrayHelper::map(\common\models\School::find()->asArray()->all(), 'id', function ($model) {
                                                    return htmlspecialchars_decode($model['name']);
                                                }),
                                                'options' => ['placeholder' => Yii::t('app', 'Укажите школу')],
                                            ]); ?>
                                            <small class="text-secondary"><?= Yii::t('app', 'Если вы не нашли вашу школу, напишите нам bilimshini.kz@mail.ru') ?></small>
                                        </div>
                                        <?php if (Yii::$app->user->identity->role === \common\models\User::ROLE_TEACHER): ?>
                                        <div class="col-md-6">
                                            <?= $form->field($model, 'teacher_title')->dropdownList([
                                                'Бастауыш мұғалімі' => 'Бастауыш мұғалімі',
                                                'Ағылшын тілі пәні мұғалімі' => 'Ағылшын тілі пәні мұғалімі',
                                                'Орыс тілі және әдебиет пәні мұғалімі' => 'Орыс пәні мұғалімі',
                                                'Математика пәні мұғалімі' => 'Математика мұғалімі',
                                                'Қазақ тілі мен әдебиет пәні мұғалімі' => 'Қазақ тілі мен әдебиет пәні мұғалімі',
                                                'Дүниетану пәні мұғалімі' => 'Дүниетану пәні мұғалімі',
                                                'Тарих пәні мұғалімі' => 'Тарих пәні мұғалімі',
                                                'Жаратылыстану пәні мұғалімі' => 'Жаратылыстану пәні мұғалімі',
                                                'Информатика пәні мұғалімі' => 'Информатика пәні мұғалімі',
                                                'Физика пәні мұғалімі' => 'Физика пәні мұғалімі',
                                                'Биология пәні мұғалімі' => 'Биология пәні мұғалімі',
                                                'Химия пәні мұғалімі' => 'Химия пәні мұғалімі',
                                                'География пәні мұғалімі' => 'География пәні мұғалімі',
                                                'Көркем еңбек пәні мұғалімі' => 'Көркем еңбек пәні мұғалімі',
                                                'Кітапханашы ' => 'Кітапханашы',
                                                'Дене шынықтыру пәні мұғалімі' => 'Дене шынықтыру пәні мұғалімі',
                                                'Өзбек тілі мен әдебиеті пәні мұғалімі' => 'Өзбек тілі мен әдебиеті пәні мұғалімі',
                                                'Мектеп алды даярлық мұғалім' => 'Мектеп алды даярлық мұғалім',
                                                'Мектеп алды даярлық тобы жетекшісі' => 'Мектеп алды даярлық тобы жетекшісі',
                                            ], [
                                                'id' => 'teacher_title-select',
                                                'prompt' => 'Мұғалімдің қызмет атауы'
                                            ]) ?>
                                        </div>
                                        <?php else: ?>
                                            <div class="col-md-3">
                                                <?= $form->field($model, 'grade')->dropDownList([
                                                    1,
                                                    2,
                                                    3,
                                                    4,
                                                    5,
                                                    6,
                                                    7,
                                                    8,
                                                    9,
                                                    10,
                                                    11,
                                                ], [
                                                    'id' => 'grade-select',
                                                    'prompt' => Yii::t('app', 'Выберите класс')
                                                ]) ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group mt-4">
                                        <?= Html::submitButton("Сақтау", ['class' => 'rbt-btn btn-gradient w-100', 'name' => 'signup-button']) ?>
                                    </div>

                                    <?php ActiveForm::end(); ?>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                <div class="rbt-my-account-inner">
                                    <h3>Orders</h3>

                                    <div class="rbt-my-account-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Miracle Morning</td>
                                                <td>Janu 22, 2023</td>
                                                <td>Pending</td>
                                                <td>$45</td>
                                                <td>
                                                    <a class="rbt-btn btn-gradient btn-sm" href="#">View Details</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Happy Strong</td>
                                                <td>Aug 22, 2023</td>
                                                <td>Approved</td>
                                                <td>$70</td>
                                                <td><a class="rbt-btn btn-gradient btn-sm" href="#">View Details</a></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Rich Dad Poor Dad</td>
                                                <td>Oct 12, 2023</td>
                                                <td>On Hold</td>
                                                <td>$20</td>
                                                <td><a class="rbt-btn btn-gradient btn-sm" href="#">View Details</a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="download" role="tabpanel">
                                <div class="rbt-my-account-inner">
                                    <h3>Downloads</h3>

                                    <div class="rbt-my-account-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>Product</th>
                                                <th>Date</th>
                                                <th>Expire</th>
                                                <th>Download</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Miracle Morning</td>
                                                <td>Aug 22, 2018</td>
                                                <td>Yes</td>
                                                <td>
                                                    <a class="rbt-btn btn-gradient btn-sm" href="#">Download File</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Happy Strong</td>
                                                <td>Sep 12, 2018</td>
                                                <td>Never</td>
                                                <td><a class="rbt-btn btn-gradient btn-sm" href="#">Download File</a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                <div class="rbt-my-account-inner">
                                    <h3>Payment Method</h3>

                                    <p class="rbt-saved-message">You Can't Saved Your Payment Method yet.</p>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                <div class="rbt-my-account-inner">
                                    <h3>Billing Address</h3>

                                    <address>
                                        <p><strong>Banani, Dhaka</strong></p>
                                        <p>1205 Supper Market<br>
                                            Dhaka, Bangladesh</p>
                                        <p>Mobile: 01911111111</p>
                                    </address>

                                    <div class="rbt-link-hover">
                                        <a href="#" class="d-inline-block"><i class="fa fa-edit mr--5"></i>Edit Address</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                <div class="rbt-my-account-inner">
                                    <h3>Account Details</h3>

                                    <div class="account-details-form">
                                        <form action="#">
                                            <div class="row g-5">
                                                <div class="col-lg-6 col-12">
                                                    <input id="first-name" placeholder="First Name" type="text">
                                                </div>

                                                <div class="col-lg-6 col-12">
                                                    <input id="last-name" placeholder="Last Name" type="text">
                                                </div>

                                                <div class="col-12">
                                                    <input id="display-name" placeholder="Display Name" type="text">
                                                </div>

                                                <div class="col-12">
                                                    <input id="email-address" placeholder="Email Address" type="email">
                                                </div>

                                                <div class="col-12">
                                                    <h4>Password change</h4>
                                                </div>

                                                <div class="col-12">
                                                    <input id="current-pwd" placeholder="Current Password" type="password">
                                                </div>

                                                <div class="col-lg-6 col-12">
                                                    <input id="new-pwd" placeholder="New Password" type="password">
                                                </div>

                                                <div class="col-lg-6 col-12">
                                                    <input id="confirm-pwd" placeholder="Confirm Password" type="password">
                                                </div>

                                                <div class="col-12">
                                                    <button class="rbt-btn btn-gradient icon-hover">
                                                        <span class="btn-text">Save Changes</span>
                                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                    </button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                        </div>
                    </div>
                    <!-- My Account Tab Content End -->
                </div>

            </div>

        </div>
    </div>
</div>

<?php
$bastaushLabel = Yii::t('site', 'Преподаватель начальных классов');
$historyLabel = Yii::t('site', 'Преподаватель истории');
$geographyLabel = Yii::t('site', 'Преподаватель географии');
$naturalSciencesLabel = Yii::t('site', 'Преподаватель по естествознанию');
$js =<<<JS
let bastaushLabel = "$bastaushLabel";
let historyLabel = "$historyLabel";
let geographyLabel = "$geographyLabel";
let naturalSciencesLabel = "$naturalSciencesLabel";
$('#profileform-region_id').change(function() {
  $.get({
    url: '/kz/site/get-cities',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#profileform-city_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});

$('#profileform-city_id').change(function() {
  $.get({
    url: '/kz/site/get-schools',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#profileform-school_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});

$('#grade-select').change(function() {
  $.get({
    url: '/kz/site/get-subjects',
    data: {grade: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name_kz + '</option>'; 
      });
      
      $('#subject_id-select').html(options);
      $('#subject_id-wrapper').show();
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});

$('#check-assignment-btn').click(function() {
  $('#check-assignment-form').toggle('ease');
});

$('#toggleBtn').click(function() {
  $('#toggleText').toggle('ease');
});

$(document).ready(() => {
    handleChange();
    
    if (parseInt($('#grade-select').val())) {
        $('#subject_id-wrapper').show();
    }
});

$('#grade-input').change(function() {
    handleChange();
});
JS;


$this->registerJs($js);
?>