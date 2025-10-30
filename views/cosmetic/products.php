<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider([
            'allModels' => $products,
            'pagination' => false,
        ]),
        'columns' => [
            'product_id',
            'product_name',
            [
                'attribute' => 'brand_id',
                'value' => function ($model) {
                    return $model->brand ? $model->brand->brand_name : '—';
                },
            ],
        ],
    ]); ?>
</div>