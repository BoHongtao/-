<?php

namespace app\models;
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
    public $logo;
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
            [['type', 'pic_id','logo'], 'required'],
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
            'file'=>'类型主图',
            'logo'=>'所属大类',
        ];
    }

    public static function getPic($result)
    {
        if (!$result) return [];
        foreach ($result as $k=>&$v){
            $v['pic'] = Pictures::find()->where(['id'=>$v['pic_id']])->asArray()->one();
        }
        return $result;
    }
}
