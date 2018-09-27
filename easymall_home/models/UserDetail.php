<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_detail".
 *
 * @property integer $user_id
 * @property integer $user_bp
 * @property string $user_mail
 * @property string $last_login_ip
 * @property string $last_login_time
 */
class UserDetail extends Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'user_bp'], 'integer'],
            [['last_login_time'], 'safe'],
            [['user_mail', 'last_login_ip'], 'string', 'max' => 32],
            [['user_add'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_bp' => '积分',
            'user_mail' => '用户邮箱',
            'last_login_ip' => '上次登陆IP',
            'last_login_time' => '上次登陆时间',
            'user_add'=>'收货地址'
        ];
    }
}
