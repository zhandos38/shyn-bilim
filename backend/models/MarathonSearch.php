<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Marathon;

/**
 * MarathonSearch represents the model behind the search form of `common\models\Marathon`.
 */
class MarathonSearch extends Marathon
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'school_id', 'grade'], 'integer'],
            [['name', 'surname', 'patronymic', 'iin', 'phone', 'phone_parent', 'phone_teacher', 'city_id', 'region_id'], 'safe'],
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
        $query = Marathon::find()
            ->alias('t1')
            ->joinWith('school as t2')
            ->leftJoin('city as t3', 't2.city_id = t3.id');

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
            't1.id' => $this->id,
            't1.school_id' => $this->school_id,
            't1.grade' => $this->grade,

            't2.city_id' => $this->city_id,
            't3.region_id' => $this->region_id,
        ]);

        $query->andFilterWhere(['t1.like', 'name', $this->name])
            ->andFilterWhere(['t1.like', 'surname', $this->surname])
            ->andFilterWhere(['t1.like', 'patronymic', $this->patronymic])
            ->andFilterWhere(['t1.like', 'iin', $this->iin])
            ->andFilterWhere(['t1.like', 'phone', $this->phone])
            ->andFilterWhere(['t1.like', 'phone_parent', $this->phone_parent])
            ->andFilterWhere(['t1.like', 'phone_teacher', $this->phone_teacher]);

        return $dataProvider;
    }
}
