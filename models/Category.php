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
 * @property string $summary
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
            [['parent_id', 'name'], 'required'],
            [['parent_id', 'level', 'created_at', 'updated_at'], 'integer'],
            [['description', 'note'], 'string'],
            [['name'], 'string', 'max' => 32],
            [['cover', 'test_ip', 'summary'], 'string', 'max' => 128],
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
            'summary' => '总结',
            'created_at' => '创建于',
            'updated_at' => '更新于',
        ];
    }

    public static function Tree($array, $pid = 0, $flag = 'category'){
        static $tree = [];
        if($flag == 'category') $tree[0] = '顶级分类';
        foreach($array as $val){
            if($val['parent_id'] == $pid){
                //$tree[] = $val;
                $tree[$val['category_id']] = str_repeat('--  ', $val['level']). $val['name'];
                self::Tree($array, $val['category_id'], $flag);
            }
        }
        return $tree;
    }

    public static function Category(){
        $rows = self::find()->asArray()->all();
        return self::Tree($rows);
    }

    public static function Product(){
        $rows = self::find()->asArray()->all();
        return self::Tree($rows, 0, 'product');
    }

    public static function GetLevel($id){
        if($id == 0) return 0;
        $row = self::find()->where(['category_id' => $id])->one();
        return $row->level + 1;
    }

    public static function HasChildren($id){
        $rows = self::find()->where(['parent_id' => $id])->all();
        return $rows ? true : false;
    }

    public static function GetCategoryName($id){
        $model = self::findOne($id);
        return $model ? $model->name : null;
    }

    /* $id 二级分类id */
    public static function CategoryProduct($id){
        $rows = self::find()->where(['parent_id' => $id])->all();
        $array = [];
        foreach($rows as $k=>$r){
            $array[$k]['name'] = $r->name;
            $array[$k]['ip'] = $r->test_ip;
            $array[$k]['note'] = $r->note;
            $array[$k]['product'] = Product::find()->where(['category_id' => $r->category_id])->asArray()->all();
        }
        return $array;
    }

    public static function TopCategory(){
        return self::find()->where(['parent_id' => 0])->all();
    }

}
