<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать заказ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'order_id',

            [
                'attribute' => 'enterprise_id',
                'label' => 'Предприятие',
                'value' => function ($model) {
                    return $model->enterprise ? $model->enterprise->enterprise_name : '—';
                },
            ],

            'order_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>