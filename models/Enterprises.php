<?php

namespace app\models;

use yii\db\ActiveRecord;

class Enterprises extends ActiveRecord
{
    public static function tableName()
    {
        return 'Enterprises';
    }

    public function getCity()
    {
        return $this->hasOne(Cities::class, ['city_id' => 'city_id']);
    }
}