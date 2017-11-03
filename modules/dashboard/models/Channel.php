<?php

namespace app\modules\dashboard\models;

use Yii;

/**
 * This is the model class for table "tbl_channel".
 *
 * @property integer $id
 * @property string $channel_id
 * @property string $description
 */
class Channel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_channel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['channel_id', 'description'], 'required'],
            [['channel_id'], 'string', 'max' => 250],
            [['description'], 'string', 'max' => 500],
            [['channel_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'channel_id' => 'Channel ID',
            'description' => 'Description',
        ];
    }
}
