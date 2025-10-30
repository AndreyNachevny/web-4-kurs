<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Административная панель';

?>

<div class="admin-default-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Выберите раздел для управления данными:</p>

    <div class="list-group">
        <?= Html::a('Бренды', ['/admin/brands/index'], ['class' => 'list-group-item list-group-item-action']) ?>
        <?= Html::a('Города', ['/admin/cities/index'], ['class' => 'list-group-item list-group-item-action']) ?>
        <?= Html::a('Предприятия', ['/admin/enterprises/index'], ['class' => 'list-group-item list-group-item-action']) ?>
        <?= Html::a('Товары', ['/admin/products/index'], ['class' => 'list-group-item list-group-item-action']) ?>
        <?= Html::a('Заказы', ['/admin/orders/index'], ['class' => 'list-group-item list-group-item-action']) ?>
        <?= Html::a('Состав заказов', ['/admin/order-items/index'], ['class' => 'list-group-item list-group-item-action']) ?>
    </div>
</div>