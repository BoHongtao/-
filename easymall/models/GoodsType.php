<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goods_type".
 *
 * @property integer $id
 * @property string $type
 * @property integer $pic_id
 * @property integer $order
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
            [['type', 'pic_id'], 'required'],
            [['pic_id', 'order'], 'integer'],
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
            'pic_id' => '图片id',
            'order' => '权重',
            'file'=>'类型主图'
        ];
    }
    public function getTypePic()
    {
        return $this->hasOne(Pictures::className(),['resource_id'=>'id']);
    }
}
