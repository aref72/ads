<?php

namespace app\modules\dashboard\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\modules\product\models\Product;
use app\modules\message\models\Message;
use app\modules\guest\models\Guest;

class DefaultController extends Controller
{
    public $layout = '//admin';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'index'],
                'rules' => [
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],

                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                   // 'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {

        if(Yii::$app->request->isAjax){
            return $this->renderAjax('index');
        }
	return $this->render('index');
    }

   
}
