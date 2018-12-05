<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trabajadordesem".
 *
 * @property int $servicio
 * @property int $trabajador
 * @property int $id
 */
class Trabajadordesem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trabajadordesem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['servicio', 'trabajador'], 'required'],
            [['servicio', 'trabajador'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'servicio' => 'Servicio',
            'trabajador' => 'Trabajador',
            'id' => 'ID',
        ];
    }
}
