<?php

namespace app\modules\account\controllers;

use Yii;
use yii\web\Controller;
use app\modules\account\models\User;
use yii\data\ActiveDataProvider;

/**
 * Default controller for the `account` module
 */
class UserController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionList()
    {
        $userSearchModel = new \app\modules\account\models\UserSearch();
        $dataProvider = $userSearchModel->search(Yii::$app->request->queryParams);
        
        
        return $this->render('list',[
            'userSearchModel' => $userSearchModel,
            'dataProvider'=>$dataProvider
        ]);
        
    }
    
    public function actionDelete($id)
    {
        $userModel= User::findOne($id);
        $userModel->delete();
        $this->redirect(['list']);
    }
    
    public function actionUpdate($id)
    {
  
        $userModel= User::findOne($id);
        $userModel->updated_at= time().'';
        $userModel->auth_key= \Yii::$app->security->generateRandomString();
        if ($userModel->load(\Yii::$app->request->post()) && $userModel->validate()){
            $userModel->password_hash= \Yii::$app->security->generatePasswordHash($userModel->password_hash);
            $userModel->save();
           $this->redirect(['list']);
        }
      return  $this->render('update',[
          'userModel'=>$userModel
      ]);

        
    }
    
    public function actionCreate()
    {
        $userModel= new User();
        $userModel->created_at= time().'';
        $userModel->updated_at= time().'';
        $userModel->auth_key= \Yii::$app->security->generateRandomString();
        if ($userModel->load(\Yii::$app->request->post()) && $userModel->validate()){
            $userModel->password_hash= \Yii::$app->security->generatePasswordHash($userModel->password_hash);
            if($userModel->save())
            {
                return true;
            }
            
        }
 
      return $this->renderAjax('create',[
            'userModel'=>$userModel
        ]);
 
        
    }
    
        public function actionView($id) {
        $userModel = User::find()->where(['id'=>$id])->one();
         if(!isset($userModel))
        {
            throw new \yii\web\HttpException("user not found", 404);
        }
         return $this->render('view', [
            'userModel' => $userModel
        ]);
        
    }
}
