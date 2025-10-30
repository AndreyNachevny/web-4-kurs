<?php
$this->title = 'Запросы';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= $this->title ?></h1>
<ul>
    <li><a href="<?= \yii\helpers\Url::to(['query/query1']) ?>">1. Предприятия в Краснодаре, Сочи, Ессентуках</a></li>
    <li><a href="<?= \yii\helpers\Url::to(['query/query2']) ?>">2. Товары бренда «Афродита»</a></li>
    <li><a href="<?= \yii\helpers\Url::to(['query/query3']) ?>">3. Количество товаров по брендам</a></li>
    <li><a href="<?= \yii\helpers\Url::to(['query/query4']) ?>">4. Товары, заказанные в указанном году</a></li>
    <li><a href="<?= \yii\helpers\Url::to(['query/query5']) ?>">5. Бренд товара «Креммасло OL»</a></li>
</ul>