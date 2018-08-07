<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sowing_map".
 *
 * @property integer $id
 * @property string $pic
 */
class SowingMap extends Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sowing_map';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pic'], 'required'],
            [['pic'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pic' => '轮播图',
        ];
    }
}
