<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "footer".
 *
 * @property string $copyright
 * @property string $phone
 * @property string $module_name_1
 * @property string $module_url_1
 * @property string $module_name_2
 * @property string $module_url_2
 * @property string $module_name_3
 * @property string $module_url_3
 * @property string $module_name_4
 * @property string $module_url_4
 */
class Footer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'footer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['copyright', 'phone'], 'required'],
            [['copyright'], 'string', 'max' => 64],
            [['phone', 'module_name_1', 'module_name_2', 'module_name_3', 'module_name_4'], 'string', 'max' => 32],
            [['module_url_1', 'module_url_2', 'module_url_3', 'module_url_4'], 'string', 'max' => 128],
            [['flag'],'int']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'copyright' => '版权所属公司名',
            'phone' => '预留电话',
            'module_name_1' => '模块1',
            'module_url_1' => '模块1链接',
            'module_name_2' => '模块2',
            'module_url_2' => '模块2链接 ',
            'module_name_3' => '模块3',
            'module_url_3' => '模块3链接',
            'module_name_4' => '模块4',
            'module_url_4' => '模块4链接',
            'flag'=>'是否选中'
        ];
    }
}
