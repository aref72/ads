<?php
namespace app\modules\ads\controllers;

use app\modules\ads\models\Ads;
/**
 * Description of CodeController
 *
 * @author asus
 */
class CodeController extends \yii\web\Controller{
    
    
    public function actionGenerateCode($aid)
    {
        if(!Ads::find()->where(['id' => $aid])->exists())
        {
            throw new \yii\web\HttpException(404, 'تبلیغ پیدا نشد');
        }
        return $this->renderAjax('generate_code');
    }
   
}
