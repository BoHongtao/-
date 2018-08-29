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

    public static function login($username) {
        $model = User::find()->where(['username' => $username])->one();
        return $model;
    }

    public function validatePassword($inputPwd, $pwd) {
        if (Yii::$app->getSecurity()->validatePassword($inputPwd, $pwd)) {
            return true;
        } else {
            return false;
        }
    }

    public static function findIdentity($id) {
        $user = User::find()->where(['id' => $id])->one();
        $distor = null;
        return $user;
    }

    public function getAuthKey() {

    }
    public static function findIdentityByAccessToken($token, $type = null) {

    }
    public function getId() {
        return $this->id;
    }

    public function validateAuthKey($authKey) {

    }


}
