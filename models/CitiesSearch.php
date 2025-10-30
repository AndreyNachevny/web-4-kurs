<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Cities;

class CitiesSearch extends Cities
{
    public function rules()
    {
        return [
            [['city_id'], 'integer'],
            [['city_name'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Cities::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'city_id' => $this->city_id,
        ]);
        $query->andFilterWhere(['like', 'city_name', $this->city_name]);
        return $dataProvider;
    }
}
