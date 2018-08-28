<?php

namespace app\models;
/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $userpwd
 * @property string $mail
 * @property string $phone
 */
class User extends Base
{
    public $repwd;
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
            [['username', 'userpwd'], 'required'],
            ['userpwd','compare','compareAttribute' => 'repwd','message'=>'与密码输入不一致'],
            [['username', 'mail'], 'string', 'max' => 255],
            [['userpwd'], 'string', 'max' => 128],
            [['phone'], 'string', 'max' => 32],
            [['username','mail','phone'],'unique'],
            [['is_vip','last_login_ip','last_login_time'],'safe']
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
            'repwd' => '确认密码',
            'mail' => '邮箱',
            'phone' => '电话',
            'is_vip'=>'是否VIP',
            'last_login_ip'=>'上次登录ip',
            'last_login_time'=>'上次登录时间'
        ];
    }
}
