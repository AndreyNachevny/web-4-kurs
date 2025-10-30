<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

$this->title = 'Запрос 2';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= $this->title ?></h1>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'brand_name')->dropDownList($brandList, ['prompt' => 'Выберите бренд']) ?>
<div class="form-group">
    <?= Html::submitButton('Найти', ['class' => 'btn btn-primary']) ?>
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
    ],
]); ?>
<?php endif; ?>