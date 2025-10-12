<?php

namespace backend\models;

use common\models\KaspiWhiteList;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * WhiteListSearch represents the model behind the search form of `common\models\WhiteList`.
 */
class KaspiWhiteListSearch extends KaspiWhiteList
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iin', 'is_activated'], 'safe'],
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
        $query = KaspiWhiteList::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ]
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
        ]);

        $query->andFilterWhere(['like', 'iin', $this->iin]);

        return $dataProvider;
    }
}
