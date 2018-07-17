<?php

namespace app\controllers;

use app\models\Brand;
use app\models\Equipment;
use app\models\Model;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/backend/default/index');
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Подгрузка моделей
     * @param $brand_id
     * @return string
     */
    public function actionGetModels($brand_id)
    {
        $models = ArrayHelper::map(Model::find()->where(['brand_id' => $brand_id])->all(), 'id', 'name');
        return $this->renderAjax('_models', ['models' => $models]);
    }

    /**
     * Подгрузка комплектаций
     * @param $model_id
     * @return string
     */
    public function actionGetEquipment($model_id)
    {
        $equipment = ArrayHelper::map(Equipment::find()->where(['model_id' => $model_id])->all(), 'id', 'name');
        return $this->renderAjax('_equipment', ['equipment' => $equipment]);
    }

    public function actionCar($brand, $model, $equipment)
    {
        $equipment = Equipment::findOne(['name' => $equipment]);

        return $this->render('car', ['equipment' => $equipment]);
    }
}
