<?php

namespace app\modules\account\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property integer $status
 * @property string $auth_key
 * @property string $password_reset_token
 * @property string $account_activation_token
 * @property string $created_at
 * @property string $updated_at
 * @property integer $level
 */
class UserSearch extends User
{

    public function rules() {
        return [
            [['id', 'username', 'email', 'status', 'level'], 'safe'],   
        ];
    }
    
    public function search($params) {
        $activeQuery = User::find();
        
        $dataProvider = new ActiveDataProvider([
            'query' => $activeQuery,
            'pagination' => [
                'pageSize' => 5
            ]
        ]);
        if(!$this->load($params) && $this->validate())
        {
            return $dataProvider;
        }
        $activeQuery->andFilterWhere(['LIKE', 'id', $this->id])
                ->andFilterWhere(['LIKE', 'username', $this->username])
                ->andFilterWhere(['LIKE', 'email', $this->email])
                ->andFilterWhere(['LIKE', 'status', $this->status])
                ->andFilterWhere(['LIKE', 'level', $this->level]);
        return $dataProvider;
    }
    
}
