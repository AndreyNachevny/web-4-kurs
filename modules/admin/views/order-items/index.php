<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары в заказе';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="order-items-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить товар в заказ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'order_item_id',

            [
                'attribute' => 'order_id',
                'label' => 'Заказ',
                'value' => function ($model) {
                    if ($model->order && $model->order->enterprise) {
                        return "Заказ №{$model->order->order_id} ({$model->order->enterprise->enterprise_name})";
                    }
                    return "Заказ №{$model->order_id}";
                },
            ],

            [
                'attribute' => 'product_id',
                'label' => 'Товар',
                'value' => function ($model) {
                    return $model->product ? $model->product->product_name : '—';
                },
            ],

            'quantity',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>