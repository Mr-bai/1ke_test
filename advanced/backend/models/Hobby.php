<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hobby".
 *
 * @property integer $hobby_id
 * @property string $hobby_name
 */
class Hobby extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hobby';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hobby_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hobby_id' => 'Hobby ID',
            'hobby_name' => 'Hobby Name',
        ];
    }
}
