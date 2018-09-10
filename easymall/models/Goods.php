<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property integer $id
 * @property string $good_name
 * @property integer $good_type
 * @property string $good_key_word
 * @property integer $good_supplier
 * @property double $price_market
 * @property double $price_sale
 * @property double $price_cost
 * @property integer $count_sale
 * @property integer $count_total
 * @property integer $count_warning
 * @property string $good_pic_main
 * @property string $good_pic
 * @property string $good_desc
 * @property integer $good_label
 * @property integer $is_sale
 */
class Goods extends Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['good_name', 'good_type', 'good_supplier', 'price_market', 'price_sale', 'price_cost', 'count_total', 'count_warning'], 'required'],
            [['good_type', 'good_supplier', 'count_sale', 'count_total', 'count_warning', 'good_label', 'is_sale'], 'integer'],
            [['price_market', 'price_sale', 'price_cost'], 'number'],
            [['good_desc'], 'string'],
            [['good_name'], 'string', 'max' => 64],
            [['good_key_word', 'good_pic_main'], 'string', 'max' => 128],
            [['good_pic'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'good_name' => '商品名称',
            'good_type' => '商品类型',
            'good_key_word' => '关键词',
            'good_supplier' => '供应商',
            'price_market' => '市场价',
            'price_sale' => '销售价',
            'price_cost' => '成本价',
            'count_sale' => '基础销量',
            'count_total' => '总库存',
            'count_warning' => '库存预警',
            'good_pic_main' => '主图',
            'good_pic' => '图片',
            'good_desc' => '商品描述',
            'good_label' => '商品标签',
            'is_sale' => '是否上架',
        ];
    }
}
