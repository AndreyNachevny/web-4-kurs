<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Brands;

class BrandsSearch extends Brands
{
    public function rules()
    {
        return [
            [['brand_id'], 'integer'],
            [['brand_name'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Brands::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'brand_id' => $this->brand_id,
        ]);
        $query->andFilterWhere(['like', 'brand_name', $this->brand_name]);
        return $dataProvider;
    }
}
