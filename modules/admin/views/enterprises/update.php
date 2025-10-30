<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Enterprises */

$this->title = 'Обновить предприятия: ' . $model->enterprise_id;
$this->params['breadcrumbs'][] = ['label' => 'Enterprises', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->enterprise_id, 'url' => ['view', 'id' => $model->enterprise_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="enterprises-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
