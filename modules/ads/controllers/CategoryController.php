<?php

namespace app\modules\ads\controllers;

class CategoryController extends \yii\web\Controller
{
    public $layout = '//admin';
    public function actionIndex()
    {
        $categorySearchModel = new \app\modules\ads\models\CategorySearch();
        $dataProvider = $categorySearchModel->search([]);
        return $this->render('index',[
            'dataProvider'=>$dataProvider
        ]);
    }
    
    public function actionView($cid) {
        $categoryModel = \app\modules\ads\models\Category::findOne($cid);
        return $this->render('view',[
            'categoryModel'=>$categoryModel
        ]);
    }
    
      public function actionUpdate($cid) {
          $categoryModel = \app\modules\ads\models\Category::findOne($cid);
          if($categoryModel->load(\Yii::$app->request->post())&& $categoryModel->validate()){
              $categoryModel->save();
              return $this->redirect(['index']);
          }
        return $this->render('update',[
            'categoryModel'=>$categoryModel
        ]);
    }       

     public function actionDelete($cid) {
         $categoryModel = \app\modules\ads\models\Category::findOne($cid);
         if(isset($categoryModel->id)){
             $categoryModel->delete();
             return $this->redirect(['index']);
         }
        return $this->render('delete');
    }
    
    public function actionCreate($cid) {
        return $this->render('create');
    }
}
