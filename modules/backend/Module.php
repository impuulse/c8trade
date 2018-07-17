<?php

namespace app\modules\backend;

use yii\helpers\Url;
use yii\web\NotFoundHttpException;

/**
 * backend module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\backend\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        $this->layout = 'backend';

        // custom initialization code goes here
    }

    public function beforeAction($action)
    {
        if(\Yii::$app->user->isGuest){
            return \Yii::$app->controller->redirect(Url::toRoute(['/site/login']));
        }

        return parent::beforeAction($action);
    }
}
