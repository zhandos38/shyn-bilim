<?php
/* @var $this \yii\web\View */
/* @var $searchModel \frontend\models\ProjectArticleSearch */

$this->title = Yii::t('app', 'Проекты');
?>
<?= $this->render('_search', ['model' => $searchModel, 'projectId' => Yii::$app->request->get('id')]) ?>

<?= \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_item'
]) ?>
