<?php

namespace app\models;

use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $userpwd;
    private $_sysUser = false;

    public function rules()
    {
        return [
            [['username', 'userpwd'], 'required'],
            ['userpwd', 'validatePassword'],
        ];
    }
    public function attributeLabels() {
        return [
            'username' => '用户名',
            'userpwd' => '密码',
        ];
    }
    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            $user = $this->getSysUser();
            if (!$user || (!$user->validatePassword($this->userpwd,$user->userpwd))) {
                $this->addError($attribute, '密码错误');
            }
        }
    }

    public function login()
    {
        if ($this->validate()) return Yii::$app->user->login($this->getSysUser(), 0);
        return false;
    }

    public function getSysUser()
    {
        if ($this->_sysUser === false) {
            $this->_sysUser = User::login($this->username);
        }
        return $this->_sysUser;
    }

    public function getAuthKey(){
        return \Yii::$app->security->generateRandomString();
    }
}
