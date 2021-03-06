<?php

namespace backend\models;

use Yii;
use common\models\User;


/**
 * This is the model class for table "user_type".
 *
 * @property integer $id
 * @property string $user_type_name
 * @property integer $user_type_value
 */
class UserType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_type_name', 'user_type_value'], 'required'],
            [['id', 'user_type_value'], 'integer'],
            [['user_type_name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'user_type_name' => Yii::t('backend', 'User Type Name'),
            'user_type_value' => Yii::t('backend', 'User Type Value'),
        ];
    }

    public function getUsers()
    {
        return $this->hasMany(User::className(), ['user_type_id' => 'id']);
    }
}
