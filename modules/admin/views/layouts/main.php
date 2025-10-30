<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->beginContent('@app/views/layouts/main.php');
?>

<div class="container">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <?php
    // Показываем кнопку "Вернуться в админку" ТОЛЬКО если НЕ на главной админки
    if (!in_array(Yii::$app->controller->action->uniqueId, ['admin/default/index'])) {
        echo Html::a('← Вернуться в админку', ['/admin'], ['class' => 'btn btn-default']);
    }
    ?>
    
    <?php
    // Показываем кнопку "Назад" на всех страницах АДМИНКИ, кроме главной (/admin)
    $currentRoute = Yii::$app->controller->getRoute();
    if ($currentRoute !== 'admin/default/index') {
        $referrer = Yii::$app->request->referrer;
        if ($referrer && $referrer !== Yii::$app->request->absoluteUrl) {
            echo Html::a('← Назад', $referrer, ['class' => 'btn btn-default']);
        } else {
            echo Html::a('← В админку', ['/admin'], ['class' => 'btn btn-default']);
        }
    }
    ?>

    <?= $content ?>
</div>

<?php $this->endContent(); ?>