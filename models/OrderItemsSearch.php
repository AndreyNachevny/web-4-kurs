<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\OrderItems;

class OrderItemsSearch extends OrderItems
{
    public function rules()
    {
        return [
            [['order_item_id', 'order_id', 'product_id', 'quantity'], 'integer'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = OrderItems::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'order_item_id' => $this->order_item_id,
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
        ]);
        return $dataProvider;
    }
}
