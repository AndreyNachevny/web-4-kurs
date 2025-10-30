<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EnterprisesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Предприятия';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enterprises-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить предприятие', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'enterprise_id',
            'enterprise_name',

            [
                'attribute' => 'city_id',
                'label' => 'Город',
                'value' => function ($model) {
                    return $model->city ? $model->city->city_name : '—';
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>