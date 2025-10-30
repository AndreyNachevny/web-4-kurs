<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Предприятия';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enterprises-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider([
            'allModels' => $enterprises,
            'pagination' => false,
        ]),
        'columns' => [
            'enterprise_id',
            'enterprise_name',
            [
                'attribute' => 'city_id',
                'value' => function ($model) {
                    return $model->city ? $model->city->city_name : '—';
                },
            ],
        ],
    ]); ?>
</div>