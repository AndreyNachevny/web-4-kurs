<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "Enterprises".
 *
 * @property int $enterprise_id
 * @property string $enterprise_name
 * @property int|null $city_id
 *
 * @property Cities $city
 * @property Orders[] $orders
 */
class Enterprises extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Enterprises';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enterprise_name'], 'required'],
            [['city_id'], 'integer'],
            [['enterprise_name'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['city_id' => 'city_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'enterprise_id' => 'Enterprise ID',
            'enterprise_name' => 'Enterprise Name',
            'city_id' => 'City ID',
        ];
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(Cities::className(), ['city_id' => 'city_id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['enterprise_id' => 'enterprise_id']);
    }
}
