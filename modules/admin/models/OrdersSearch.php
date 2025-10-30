<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Orders;

class OrdersSearch extends Orders
{
    public function rules()
    {
        return [
            [['order_id', 'enterprise_id'], 'integer'],
            [['order_date'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Orders::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'order_id' => $this->order_id,
            'enterprise_id' => $this->enterprise_id,
            'order_date' => $this->order_date,
        ]);
        return $dataProvider;
    }
}
