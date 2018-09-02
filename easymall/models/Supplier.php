<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property integer $id
 * @property string $supplier_name
 * @property string $link_name
 * @property string $link_tel
 * @property string $link_address
 * @property string $desc
 */

class Supplier extends Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['supplier_name', 'link_name', 'link_tel', 'link_address'], 'required'],
            [['supplier_name', 'link_name', 'link_tel'], 'string', 'max' => 64],
            [['link_address'], 'string', 'max' => 128],
            [['desc'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '供应商ID',
            'supplier_name' => '供应商名称',
            'link_name' => '联系人姓名',
            'link_tel' => '联系人电话',
            'link_address' => '联系人地址',
            'desc' => '描述信息',
        ];
    }
}
