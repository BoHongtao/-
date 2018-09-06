<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $userpwd
 * @property string $phone
 * @property string $is_vip
 * @property integer $is_first_login
 */
class User extends Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'userpwd', 'phone'], 'required'],
            [['is_vip'], 'string'],
            [['is_first_login'], 'integer'],
            [['username'], 'string', 'max' => 255],
            [['userpwd'], 'string', 'max' => 128],
            [['phone'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'userpwd' => '密码',
            'phone' => '电话',
            'is_vip' => '是否VIP',
            'is_first_login' => '是否首次登陆',
        ];
    }
}
