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
            [['name', 'surname', 'patronymic', 'iin', 'phone', 'phone_parent', 'phone_teacher'], 'safe'],
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
        $query = Marathon::find();

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
            'school_id' => $this->school_id,
            'grade' => $this->grade,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'patronymic', $this->patronymic])
            ->andFilterWhere(['like', 'iin', $this->iin])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'phone_parent', $this->phone_parent])
            ->andFilterWhere(['like', 'phone_teacher', $this->phone_teacher]);

        return $dataProvider;
    }
}
