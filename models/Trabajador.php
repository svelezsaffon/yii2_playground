<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trabajador".
 *
 * @property int $id
 * @property string $cedula
 * @property string $telefono
 * @property string $nombre
 * @property string $apellido
 *
 * @property Servicioxtrabajador[] $servicioxtrabajadors
 */
class Trabajador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trabajador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedula', 'telefono', 'nombre', 'apellido'], 'required'],
            [['cedula', 'nombre', 'apellido'], 'string', 'max' => 50],
            [['telefono'], 'string', 'max' => 25],
            [['cedula'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cedula' => 'Cedula',
            'telefono' => 'Telefono',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioxtrabajadors()
    {
        return $this->hasMany(Servicioxtrabajador::className(), ['trabajador' => 'id']);
    }
}
