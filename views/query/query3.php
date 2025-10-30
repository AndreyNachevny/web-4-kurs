<?php
use yii\grid\GridView;

$this->title = 'Запрос 3';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= $this->title ?></h1>

<?= GridView::widget([
    'dataProvider' => new \yii\data\ArrayDataProvider([
        'allModels' => $results,
        'pagination' => false,
    ]),
    'columns' => [
        ['label' => 'Бренд', 'value' => function($m) { return $m['brand_name']; }],
        ['label' => 'Количество товаров', 'value' => function($m) { return $m['product_count']; }],
    ],
]); ?>