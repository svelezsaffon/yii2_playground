<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servicios".
 *
 * @property string $nombre
 * @property string $descripcion
 * @property int $id
 *
 * @property Servicioxtrabajador[] $servicioxtrabajadors
 */
class Servicios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'servicios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion'], 'required'],
            [['descripcion'], 'string'],
            [['nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'id' => 'ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioxtrabajadors()
    {
        return $this->hasMany(Servicioxtrabajador::className(), ['servicio' => 'id']);
    }
}
