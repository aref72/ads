<?php
namespace app\modules\ads\models;

/**
 * Description of EntityForm
 *
 * @author asus
 */
class EntityForm extends \yii\base\Model{
    
    public $type;
    
    
    public function rules() {
        return [
            ['type', 'required'],
            ['type', 'integer']
        ];
    }
    
    
    public function addEntity($params, $aid)
    {
        
    }
    
}
