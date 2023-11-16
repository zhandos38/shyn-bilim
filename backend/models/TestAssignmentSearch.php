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
    public $test_id;
    public $city_id;
    public $region_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'test_id', 'olympiad_id', 'school_id', 'subject_id', 'grade', 'point', 'status', 'created_at', 'finished_at', 'city_id', 'region_id'], 'integer'],
            [['name', 'surname', 'patronymic', 'iin', 'phone'], 'safe'],
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
                ->alias('t1')
                ->joinWith('school as t2')
                ->leftJoin('city as t3', 't2.city_id = t3.id');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC
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
            't1.id' => $this->id,
            't1.olympiad_id' => $this->olympiad_id,
            't4.test_id' => $this->test_id,
            't1.school_id' => $this->school_id,
            't1.subject_id' => $this->subject_id,
            't1.grade' => $this->grade,
            't1.point' => $this->point,
            't1.status' => $this->status,
            't1.created_at' => $this->created_at,
            't1.finished_at' => $this->finished_at,

            't2.city_id' => $this->city_id,
            't3.region_id' => $this->region_id
        ]);

        $query->andFilterWhere(['like', 't1.name', $this->name])
            ->andFilterWhere(['like', 't1.surname', $this->surname])
            ->andFilterWhere(['like', 't1.patronymic', $this->patronymic])
            ->andFilterWhere(['like', 't1.phone', $this->phone])
            ->andFilterWhere(['like', 't1.iin', $this->iin]);

        return $dataProvider;
    }
}
