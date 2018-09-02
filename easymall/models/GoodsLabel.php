<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goods_label".
 *
 * @property integer $id
 * @property string $label_name
 * @property integer $sort
 */
class GoodsLabel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods_label';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['label_name'], 'required'],
            [['sort'], 'integer'],
            [['label_name'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label_name' => '标签名',
            'sort' => '排序',
        ];
    }
}
