<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Enterprises;

class EnterprisesSearch extends Enterprises
{
    public function rules()
    {
        return [
            [['enterprise_id', 'city_id'], 'integer'],
            [['enterprise_name'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Enterprises::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'enterprise_id' => $this->enterprise_id,
            'city_id' => $this->city_id,
        ]);
        $query->andFilterWhere(['like', 'enterprise_name', $this->enterprise_name]);
        return $dataProvider;
    }
}
