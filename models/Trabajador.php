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
 * @property int $anosexperiencia
 * @property string $descripcion
 * @property int $serviciosprestados
 *
 * @property Plane[] $planes
 * @property Ranking[] $rankings
 * @property Servicioxdia[] $servicioxdias
 */
class Trabajador extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trabajador';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula', 'telefono', 'nombre', 'apellido'], 'required'],
            [['anosexperiencia', 'serviciosprestados'], 'integer'],
            [['descripcion'], 'string'],
            [['cedula', 'nombre', 'apellido'], 'string', 'max' => 50],
            [['telefono'], 'string', 'max' => 25],
            [['cedula'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cedula' => 'Cedula',
            'telefono' => 'Telefono',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'anosexperiencia' => 'Anosexperiencia',
            'descripcion' => 'Descripcion',
            'serviciosprestados' => 'Serviciosprestados',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanes()
    {
        return $this->hasMany(Plane::className(), ['trabajador' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRankings()
    {
        return $this->hasMany(Ranking::className(), ['idtrabajador' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioxdias()
    {
        return $this->hasMany(Servicioxdia::className(), ['trabajador' => 'id']);
    }
}
