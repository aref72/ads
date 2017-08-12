<?php

namespace app\modules\account\controllers;

use Yii;
use yii\web\Controller;

/**
 * Default controller for the `account` module
 */
class UserController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $userModel = new \app\modules\account\models\User();
        $userModel->auth_key = Yii::$app->security->generateRandomString();
        return $this->render('index');
    }
}
