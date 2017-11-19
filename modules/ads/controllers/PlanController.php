<?php

namespace app\modules\ads\controllers;

class PlanController extends \yii\web\Controller
{
    public $layout = '//admin';
    public function actionIndex()
    {
         $planSearchModel = new \app\modules\ads\models\PlanSearch();
        $dataProvider = $planSearchModel->search([]);
        
        return $this->render('index',[
            'dataProvider'=>$dataProvider
        ]);
    }
    
     public function actionView($cid) {
        $planModel = \app\modules\ads\models\Plan::findOne($cid);
        return $this->render('view',[
            'planModel'=>$planModel
        ]);
    }
    
      public function actionUpdate($cid) {
          $planModel = \app\modules\ads\models\Plan::findOne($cid);
          if($planModel->load(\Yii::$app->request->post())&& $planModel->validate()){
              $planModel->save();
              return $this->redirect(['index']);
          }
        return $this->render('update',[
            'planModel'=>$planModel
        ]);
    }       

     public function actionDelete($cid) {
         $planModel = \app\modules\ads\models\Plan::findOne($cid);
         if(isset($planModel->id)){
             $planModel->delete();
             return $this->redirect(['index']);
         }
        return $this->render('delete');
    }
    
    public function actionCreate() {
         $planModel = new \app\modules\ads\models\Plan;
             if($planModel->load(\Yii::$app->request->post())&& $planModel->validate()){
                  $planModel->save();
                  return $this->redirect(['index']);
                 }
                 
        return $this->render('create',[
            'planModel'=>$planModel
        ]);
    }

}
