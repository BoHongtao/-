<?php

namespace app\models;

/**
 * This is the model class for table "pictures".
 *
 * @property integer $id
 * @property string $filename
 * @property integer $resource_id
 */
class Pictures extends Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pictures';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filename','id'], 'required'],
            [['filename'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filename' => 'Filename'
        ];
    }
}
