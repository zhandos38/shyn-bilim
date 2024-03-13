<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ArticleMagazineRelease;

/**
 * ArticleMagazineReleaseSearch represents the model behind the search form of `common\models\ArticleMagazineRelease`.
 */
class ArticleMagazineReleaseSearch extends ArticleMagazineRelease
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'article_magazine_id'], 'integer'],
            [['name', 'img', 'file'], 'safe'],
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
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ArticleMagazineRelease::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'article_magazine_id' => $this->article_magazine_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}
