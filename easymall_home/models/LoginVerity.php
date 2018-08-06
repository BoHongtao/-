<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/7/30
 * Time: 16:29
 */

namespace app\models;
use Yii;
use yii\base\Model;

class LoginVerity extends Model
{
    public $userName;
    public $password;
    public $code;
    private $_sysUser = false;


    public function rules()
    {
        return [
            [['userName', 'password'], 'required'],
            ['password', 'validatePassword'],
            ['code', 'captcha']
        ];
    }

    public function attributeLabels()
    {
        return [
            'userName' => '',
            'password' => '',
            'code' => ''
        ];
    }

    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            $user = $this->getSysUser();
            if (!$user || (!$user->validatePassword($this->password, $user->password))) {
                $this->addError($attribute, '用户名/密码错误');
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
            $this->_sysUser = Operators::login($this->userName);
        }
        return $this->_sysUser;
    }

    public function getAuthKey()
    {
        return \Yii::$app->security->generateRandomString();
    }
}