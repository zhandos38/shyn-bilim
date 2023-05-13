<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Test;

/**
 * TestSearch represents the model behind the search form of `common\models\Test`.
 */
class TestSearch extends Test
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'grade_from', 'grade_to', 'question_limit', 'time_limit', 'level', 'olympiad_id', 'created_at'], 'integer'],
            ['lang', 'string'],
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
        $query = Test::find();

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
            'grade_from' => $this->grade_from,
            'grade_to' => $this->grade_to,
            'question_limit' => $this->question_limit,
            'time_limit' => $this->time_limit,
            'level' => $this->level,
            'lang' => $this->lang,
            'olympiad_id' => $this->olympiad_id,
        ]);

        return $dataProvider;
    }
}
