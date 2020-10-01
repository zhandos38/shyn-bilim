<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TestAssignment;

/**
 * TestAssignmentSearch represents the model behind the search form of `common\models\TestAssignment`.
 */
class TestAssignmentSearch extends TestAssignment
{
    public $city_id;
    public $region_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'test_id', 'school_id', 'grade', 'point', 'status', 'created_at', 'finished_at', 'city_id', 'region_id'], 'integer'],
            [['name', 'surname', 'patronymic', 'iin'], 'safe'],
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
        $query = TestAssignment::find()
                ->joinWith('school as t2')
                ->leftJoin('city as t3', 't2.city_id = t3.id');

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
            'test_id' => $this->test_id,
            'school_id' => $this->school_id,
            'grade' => $this->grade,
            'point' => $this->point,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'finished_at' => $this->finished_at,

            't2.city_id' => $this->city_id,
            't3.region_id' => $this->region_id
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'patronymic', $this->patronymic])
            ->andFilterWhere(['like', 'iin', $this->iin]);

        return $dataProvider;
    }
}
