<?php

namespace app\models;

use yii\db\ActiveRecord;

class Orders extends ActiveRecord
{
    public static function tableName()
    {
        return 'Orders';
    }

    public function getEnterprise()
    {
        return $this->hasOne(Enterprises::class, ['enterprise_id' => 'enterprise_id']);
    }

    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::class, ['order_id' => 'order_id']);
    }
}