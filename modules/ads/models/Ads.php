<?php

namespace app\modules\ads\models;

use Yii;
use app\modules\account\models\User;

/**
 * This is the model class for table "ads".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $star
 * @property string $rate
 * @property integer $status
 * @property string $tags
 * @property string $created_at
 * @property string $updated_at
 * @property integer $user_id
 * @property integer $type_id
 * @property integer $plan_id
 *
 * @property User $user
 * @property Plan $plan
 * @property Type $type
 * @property AdsPlan[] $adsPlans
 */
class Ads extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['description'], 'string'],
            [['status', 'user_id', 'type_id', 'plan_id'], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['image', 'tags'], 'string', 'max' => 100],
            [['star'], 'string', 'max' => 5],
            [['rate'], 'string', 'max' => 20],
            [['created_at', 'updated_at'], 'string', 'max' => 30],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plan::className(), 'targetAttribute' => ['plan_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'image' => 'Image',
            'star' => 'Star',
            'rate' => 'Rate',
            'status' => 'Status',
            'tags' => 'Tags',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
            'type_id' => 'Type ID',
            'plan_id' => 'Plan ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlan()
    {
        return $this->hasOne(Plan::className(), ['id' => 'plan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdsPlans()
    {
        return $this->hasMany(AdsPlan::className(), ['ads_id' => 'id']);
    }
}
