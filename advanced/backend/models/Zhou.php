<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zhou".
 *
 * @property integer $id
 * @property string $nickname
 * @property string $Birthday
 * @property string $address
 * @property string $tel
 * @property string $password
 * @property string $new_pwd
 * @property string $hobby
 */
class Zhou extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zhou';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nickname', 'Birthday', 'address', 'tel', 'password', 'new_pwd', 'hobby'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nickname' => 'Nickname',
            'Birthday' => 'Birthday',
            'address' => 'Address',
            'tel' => 'Tel',
            'password' => 'Password',
            'new_pwd' => 'New Pwd',
            'hobby' => 'Hobby',
        ];
    }
}
