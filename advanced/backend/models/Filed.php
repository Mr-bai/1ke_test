<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "filed".
 *
 * @property integer $id
 * @property string $filed_name
 * @property integer $filed_num
 * @property string $filed_type
 * @property string $filed_xuan
 * @property string $filed_bi
 * @property string $filed_gui
 * @property string $filed_length
 */
class Filed extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filed';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filed_num'], 'integer'],
            [['filed_name', 'filed_type', 'filed_xuan', 'filed_bi', 'filed_gui', 'filed_length'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filed_name' => 'Filed Name',
            'filed_num' => 'Filed Num',
            'filed_type' => 'Filed Type',
            'filed_xuan' => 'Filed Xuan',
            'filed_bi' => 'Filed Bi',
            'filed_gui' => 'Filed Gui',
            'filed_length' => 'Filed Length',
        ];
    }
}
