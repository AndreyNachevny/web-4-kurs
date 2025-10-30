<?php

namespace app\modules\admin;

use Yii;
use yii\web\ForbiddenHttpException;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\admin\controllers';

    public function init()
    {
        parent::init();

        $this->layout = 'main'; 

        if (Yii::$app->user->isGuest) {
            Yii::$app->user->loginRequired();
            Yii::$app->end();
        }

        $user = Yii::$app->user->identity;
        if (!$user || !$user->getIsAdmin()) {
            throw new ForbiddenHttpException('Доступ запрещён. Требуются права администратора.');
        }
    }
}