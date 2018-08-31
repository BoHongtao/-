<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goods_type".
 *
 * @property integer $id
 * @property string $type
 * @property integer $order
 * @property string $logo
 * @property integer $pic_id
 */
class GoodsType extends Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'logo', 'pic_id'], 'required'],
            [['order', 'pic_id'], 'integer'],
            [['logo'], 'string'],
            [['type'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => '类型名字',
            'order' => '权重',
            'logo' => 'logo',
            'pic_id' => 'Pic ID',
        ];
    }
}
