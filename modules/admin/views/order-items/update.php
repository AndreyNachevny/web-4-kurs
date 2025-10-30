<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\OrderItems */

$this->title = 'Обновить товары в заказе: ' . $model->order_item_id;
$this->params['breadcrumbs'][] = ['label' => 'Order Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->order_item_id, 'url' => ['view', 'id' => $model->order_item_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-items-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
