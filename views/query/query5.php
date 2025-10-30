<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Запрос 5';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= $this->title ?></h1>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'product_name')->dropDownList($productList, ['prompt' => 'Выберите товар']) ?>
<div class="form-group">
    <?= Html::submitButton('Найти бренд', ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>

<?php if ($result !== null): ?>
<div class="alert alert-info">
    <strong>Результат:</strong> <?= Html::encode($result) ?>
</div>
<?php endif; ?>