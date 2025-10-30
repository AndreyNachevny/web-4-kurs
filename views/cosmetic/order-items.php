<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Состав заказов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-items-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider([
            'allModels' => $orderItems,
            'pagination' => false,
        ]),
        'columns' => [
            'order_item_id',
            [
                'label' => 'Заказ',
                'value' => function ($model) {
                    if ($model->order && $model->order->enterprise) {
                        return 'Заказ №' . $model->order->order_id . ' (' . $model->order->enterprise->enterprise_name . ', ' . $model->order->order_date . ')';
                    }
                    return 'Заказ №' . $model->order_id;
                },
            ],
            [
                'label' => 'Товар',
                'value' => function ($model) {
                    return $model->product ? $model->product->product_name : '—';
                },
            ],
            'quantity',
        ],
    ]); ?>
</div>