<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property integer $category_id
 * @property integer $parent_id
 * @property string $name
 * @property string $cover
 * @property string $description
 * @property string $test_ip
 * @property string $note
 * @property integer $level
 * @property integer $created_at
 * @property integer $updated_at
 */
class Category extends ActiveRecord
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
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'name', 'level', 'created_at', 'updated_at'], 'required'],
            [['parent_id', 'level', 'created_at', 'updated_at'], 'integer'],
            [['description', 'note'], 'string'],
            [['name'], 'string', 'max' => 32],
            [['cover', 'test_ip'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'ID',
            'parent_id' => '父级分类',
            'name' => '名称',
            'cover' => '封面',
            'description' => '描述',
            'test_ip' => '测试IP',
            'note' => '备注',
            'level' => '等级',
            'created_at' => '创建于',
            'updated_at' => '更新于',
        ];
    }
}
