<?php
namespace frontend\models;


use common\models\Article;
use Yii;
use yii\base\Model;
use Exception;
use yii\helpers\VarDumper;

/**
 * Class OrderPayForm
 * @package api\modules\paybox\forms
 *
 * @property mixed $requestFields
 */
class CheckArticleForm extends Model
{
    public $iin;
    public $subject_id;
    public $article_magazine_id;

    public function rules()
    {
        return [
            [['iin', 'subject_id', 'article_magazine_id'], 'required'],
            ['iin', 'string', 'max' => 20],
            [['subject_id'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
          'iin' => Yii::t('app', 'ИИН'),
          'subject_id' => Yii::t('app', 'Предмет'),
        ];
    }

    public function check()
    {
        $query = Article::find()->andWhere(['iin' => $this->iin, 'subject_id' => $this->subject_id]);
        $query->andWhere(['status' => Article::STATUS_ACTIVE]);
        $query->andWhere(['article_magazine_id' => $this->article_magazine_id]);
        $query->orderBy(['id' => SORT_DESC]);

        $article = $query->one();


        if ($article) {
            return $article->id;
        }

        return false;
    }
}
