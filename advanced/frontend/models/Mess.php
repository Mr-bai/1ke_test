<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mess".
 *
 * @property integer $u_id
 * @property string $massage
 * @property string $content
 * @property integer $id
 */
class Mess extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mess';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['massage', 'content'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'u_id' => 'U ID',
            'massage' => 'Massage',
            'content' => 'Content',
            'id' => 'ID',
        ];
    }
}
