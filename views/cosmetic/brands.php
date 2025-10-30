<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Бренды';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brands-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider([
            'allModels' => $brands,
            'pagination' => false,
        ]),
        'columns' => [
            'brand_id',
            'brand_name',
        ],
    ]); ?>
</div>