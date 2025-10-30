<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Products;

class ProductsSearch extends Products
{
    public function rules()
    {
        return [
            [['product_id', 'brand_id'], 'integer'],
            [['product_name'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Products::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'product_id' => $this->product_id,
            'brand_id' => $this->brand_id,
        ]);
        $query->andFilterWhere(['like', 'product_name', $this->product_name]);
        return $dataProvider;
    }
}
