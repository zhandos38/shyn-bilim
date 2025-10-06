<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/** @var \backend\forms\ImportExcelWhiteList $model */

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
$model->olympiad_id = 28;
?>
<?= $form->field($model, 'olympiad_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Olympiad::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Выберите олимпиаду']) ?>
<?= $form->field($model, 'file')->fileInput() ?>
<?= Html::submitButton('Импорт', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>
<?php
