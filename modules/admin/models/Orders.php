<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "Orders".
 *
 * @property int $order_id
 * @property int|null $enterprise_id
 * @property string $order_date
 *
 * @property OrderItems[] $orderItems
 * @property Enterprises $enterprise
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enterprise_id'], 'integer'],
            [['order_date'], 'required'],
            [['order_date'], 'safe'],
            [['enterprise_id'], 'exist', 'skipOnError' => true, 'targetClass' => Enterprises::className(), 'targetAttribute' => ['enterprise_id' => 'enterprise_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'enterprise_id' => 'Enterprise ID',
            'order_date' => 'Order Date',
        ];
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['order_id' => 'order_id']);
    }

    /**
     * Gets query for [[Enterprise]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnterprise()
    {
        return $this->hasOne(Enterprises::className(), ['enterprise_id' => 'enterprise_id']);
    }
}
