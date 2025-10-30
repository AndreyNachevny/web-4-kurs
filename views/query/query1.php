<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

$this->title = 'Запрос 1';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= $this->title ?></h1>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'cities')->checkboxList($cityList) ?>
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
        ['label' => 'Предприятие', 'value' => function($m) { return $m['enterprise_name']; }],
        ['label' => 'Город', 'value' => function($m) { return $m['city_name']; }],
    ],
]); ?>
<?php endif; ?>