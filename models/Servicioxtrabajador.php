<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servicioxtrabajador".
 *
 * @property int $servicio
 * @property int $trabajador
 * @property string $tipo
 */
class Servicioxtrabajador extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'servicioxtrabajador';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['servicio', 'trabajador', 'tipo'], 'required'],
            [['servicio', 'trabajador'], 'integer'],
            [['tipo'], 'string', 'max' => 1],
            [['servicio', 'trabajador', 'tipo'], 'unique', 'targetAttribute' => ['servicio', 'trabajador', 'tipo']],
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
            'tipo' => 'Tipo',
        ];
    }
}
