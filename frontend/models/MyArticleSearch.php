<?php

namespace frontend\models;

use common\models\Article;
use common\models\Project;
use common\models\Subject;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ProjectArticleSearch represents the model behind the search form of `common\models\ProjectArticle`.
 */
class MyArticleSearch extends Article
{
    public $fileTemp;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'patronymic', 'file'], 'string'],
            [['subject_id', 'created_at'], 'integer'],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'id']],

            [['fileTemp'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf, doc, docx, ttf', 'maxSize' => 1024 * 1024 * 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @param $projectId
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Article::find()->andWhere(['user_id' => Yii::$app->user->getId()]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ],
            'pagination' => [
                'pageSize' => 20
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'patronymic', $this->patronymic]);

        return $dataProvider;
    }
}
