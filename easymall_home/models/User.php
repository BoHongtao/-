<?php

namespace app\models;

use Yii;

class User extends Base implements \yii\web\IdentityInterface
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
            ['userpwd','compare','compareAttribute' => 'repwd','message'=>'与密码输入不一致','on'=>'register'],
            [['username'], 'string', 'max' => 255],
            [['userpwd'], 'string', 'max' => 128],
            [['phone'], 'string', 'max' => 32],
            [['username','phone'],'unique'],
            [['is_vip'],'safe']
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
            'phone' => '电话',
            'is_vip'=>'是否VIP',
        ];
    }

    public static function login($username)
    {
        $model = User::find()->where(['username' => $username])->one();
        return $model;
    }

    public function validatePassword($inputPwd, $pwd)
    {
        if (Yii::$app->getSecurity()->validatePassword($inputPwd, $pwd)) {
            return true;
        } else {
            return false;
        }
    }

    public static function findIdentity($id)
    {
        $user = User::find()->where(['id' => $id])->one();
        $distor = null;
        return $user;
    }

    public function getAuthKey()
    {
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
    }
    public function getId()
    {
        return $this->id;
    }

    public function validateAuthKey($authKey)
    {
    }
}
