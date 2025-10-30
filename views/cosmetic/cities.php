<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Города';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cities-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider([
            'allModels' => $cities,
            'pagination' => false,
        ]),
        'columns' => [
            'city_id',
            'city_name',
        ],
    ]); ?>
</div>