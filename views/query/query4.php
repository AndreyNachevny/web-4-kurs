<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

$this->title = 'Запрос 4';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= $this->title ?></h1>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'year')->textInput(['type' => 'number']) ?>
<div class="form-group">
    <?= Html::submitButton('Показать заказы', ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>

<?php if (!empty($results)): ?>
<?= GridView::widget([
    'dataProvider' => new \yii\data\ArrayDataProvider([
        'allModels' => $results,
        'pagination' => false,
    ]),
    'columns' => [
        ['label' => 'Товар', 'value' => function($m) { return $m['product_name']; }],
        ['label' => 'Бренд', 'value' => function($m) { return $m['brand_name']; }],
        ['label' => 'Дата заказа', 'value' => function($m) { return $m['order_date']; }],
    ],
]); ?>
<?php endif; ?>