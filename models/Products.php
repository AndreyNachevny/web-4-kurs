<?php

namespace app\models;

use yii\db\ActiveRecord;

class Products extends ActiveRecord
{
    public static function tableName()
    {
        return 'Products';
    }

    public function getBrand()
    {
        return $this->hasOne(Brands::class, ['brand_id' => 'brand_id']);
    }
}