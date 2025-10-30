<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider([
            'allModels' => $orders,
            'pagination' => false,
        ]),
        'columns' => [
            'order_id',
            [
                'attribute' => 'enterprise_id',
                'value' => function ($model) {
                    return $model->enterprise ? $model->enterprise->enterprise_name : '—';
                },
            ],
            'order_date',
        ],
    ]); ?>
</div>