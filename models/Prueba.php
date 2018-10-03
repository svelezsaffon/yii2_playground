<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prueba".
 *
 * @property string $name
 * @property int $age
 */
class Prueba extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prueba';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'age'], 'required'],
            [['age'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['age'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'age' => 'Age',
        ];
    }
}
