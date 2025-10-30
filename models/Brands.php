<?php

namespace app\models;

use yii\db\ActiveRecord;

class Brands extends ActiveRecord
{
    public static function tableName()
    {
        return 'Brands';
    }
}