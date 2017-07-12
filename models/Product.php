<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "{{%product}}".
 *
 * @property integer $product_id
 * @property integer $category_id
 * @property string $type
 * @property string $cpu
 * @property string $memory
 * @property string $disk
 * @property string $bandwidth
 * @property string $ip_count
 * @property string $operating_system
 * @property integer $has_ipmi
 * @property string $price
 * @property string $position
 * @property string $uri
 * @property integer $created_at
 * @property integer $updated_at
 */
class Product extends ActiveRecord
{
    public function behaviors(){
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'type', 'cpu', 'memory', 'disk', 'bandwidth', 'ip_count', 'operating_system', 'price', 'uri'], 'required'],
            [['category_id', 'has_ipmi', 'created_at', 'updated_at'], 'integer'],
            [['type', 'cpu', 'memory', 'disk', 'bandwidth', 'ip_count', 'operating_system', 'price', 'position'], 'string', 'max' => 32],
            [['uri'], 'string', 'max' => 255],
            [['uri'], 'url'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {

        return [
            'product_id' => 'ID',
            'category_id' => '所属分类',
            'type' => '型号',
            'cpu' => 'CPU',
            'memory' => '内存',
            'disk' => '磁盘',
            'bandwidth' => '带宽',
            'ip_count' => 'IP数量',
            'operating_system' => '操作系统',
            'has_ipmi' => 'IPMI',
            'price' => '价格',
            'position' => '位置/机房',
            'uri' => '购买链接',
            'created_at' => '创建于',
            'updated_at' => '更新于',
        ];
    }
}
