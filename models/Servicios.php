<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servicios".
 *
 * @property string $nombre
 * @property string $descripcion
 * @property int $id
 * @property string $image
 * @property string $icon
 *
 * @property Plane[] $planes
 * @property Servicioxdia[] $servicioxdias
 * @property Servicioxtrabajador[] $servicioxtrabajadors
 */
class Servicios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'servicios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion'], 'required'],
            [['descripcion'], 'string'],
            [['nombre', 'image', 'icon'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'id' => 'ID',
            'image' => 'Image',
            'icon' => 'Icon',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanes()
    {
        return $this->hasMany(Plane::className(), ['servicio' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioxdias()
    {
        return $this->hasMany(Servicioxdia::className(), ['servicio' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioxtrabajadors()
    {
        return $this->hasMany(Servicioxtrabajador::className(), ['servicio' => 'id']);
    }
}
