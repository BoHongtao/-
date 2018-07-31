<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "operators_info".
 *
 * @property integer $id
 * @property integer $operator_id
 * @property string $truename
 * @property string $company
 * @property string $email
 * @property string $contact_phone
 * @property string $wechat
 * @property string $head_pic
 */
class OperatorsInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operators_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['operator_id', 'truename', 'email'], 'required'],
            [['operator_id'], 'integer'],
            [['truename'], 'string', 'max' => 20],
            [['company', 'email'], 'string', 'max' => 60],
            [['contact_phone'], 'string', 'max' => 255],
            [['wechat'], 'string', 'max' => 50],
            [['head_pic'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'operator_id' => '管理员ID',
            'truename' => '真实姓名',
            'company' => '公司名称',
            'email' => '电子邮箱',
            'contact_phone' => '联系电话',
            'wechat' => '微信号',
            'head_pic' => '头像',
        ];
    }
}
