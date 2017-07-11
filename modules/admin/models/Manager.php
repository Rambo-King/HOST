<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%manager}}".
 *
 * @property integer $manager_id
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property string $access_token
 * @property string $account_name
 * @property integer $created_at
 * @property integer $updated_at
 */
class Manager extends ActiveRecord
{
    public function setPassword($password) {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public $password2;
    public $password3;
    public $password4;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%manager}}';
    }

    public function behaviors(){
        return [
            /*[
                'class' => \yii\behaviors\BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],*/
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    public function scenarios(){
        $parentScenarios = parent::scenarios();
        $selfScenarios = [
            'add' => ['username', 'password', 'password2', 'account_name'],
            'modify' => ['account_name'],
            'change' => ['password3', 'password4'],
        ];
        return array_merge($parentScenarios, $selfScenarios);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'account_name'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['username', 'auth_key', 'account_name'], 'string', 'max' => 32],
            [['password', 'access_token'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['password2'], 'required'],
            ['password2', 'compare', 'compareAttribute'=>'password'],
            [['password3', 'password4'], 'required', 'on' => 'change'],
            ['password4', 'compare', 'compareAttribute'=>'password3'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'manager_id' => 'ID',
            'username' => '登录用户名',
            'password' => '密码',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'account_name' => '账户名',
            'created_at' => '创建于',
            'updated_at' => '更新于',
            'password2' => '确认密码',
            'password3' => '新密码',
            'password4' => '确认密码',
        ];
    }

    public function Add(){
        if($this->validate()){
            $manager = new Manager();
            $manager->username = $this->username;
            $manager->setPassword($this->password);
            $manager->password2 = $manager->password;
            $manager->account_name = $this->account_name;
            $manager->generateAuthKey();
            if($manager->save()) return $manager;
            else print_r($manager->getErrors());
        }
        return null;
    }
}
