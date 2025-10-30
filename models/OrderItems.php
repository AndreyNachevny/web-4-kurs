<?php

namespace app\models;

use yii\db\ActiveRecord;

class OrderItems extends ActiveRecord
{
    public static function tableName()
    {
        return 'OrderItems';
    }

    public function getOrder()
    {
        return $this->hasOne(Orders::class, ['order_id' => 'order_id']);
    }

    public function getProduct()
    {
        return $this->hasOne(Products::class, ['product_id' => 'product_id']);
    }
}