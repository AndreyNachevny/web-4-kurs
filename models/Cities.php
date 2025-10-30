<?php

namespace app\models;

use yii\db\ActiveRecord;

class Cities extends ActiveRecord
{
    public static function tableName()
    {
        return 'Cities';
    }
}