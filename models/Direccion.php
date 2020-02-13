<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "direccion".
 *
 * @property int $id
 * @property int $user
 * @property string $direccion
 * @property string $nombre
 * @property string $puntos_referencia
 * @property string $quien_recibe
 * @property int $ciudad
 *
 * @property Ciudades $ciudad0
 * @property User $user0
 * @property Plane[] $planes
 * @property Servicioxdia[] $servicioxdias
 */
class Direccion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'direccion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user', 'direccion', 'nombre', 'ciudad'], 'required'],
            [['user', 'ciudad'], 'integer'],
            [['direccion', 'puntos_referencia', 'quien_recibe'], 'string'],
            [['nombre'], 'string', 'max' => 200],
            [['ciudad'], 'exist', 'skipOnError' => true, 'targetClass' => Ciudades::className(), 'targetAttribute' => ['ciudad' => 'id']],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'direccion' => 'Direccion',
            'nombre' => 'Nombre',
            'puntos_referencia' => 'Puntos Referencia',
            'quien_recibe' => 'Quien Recibe',
            'ciudad' => 'Ciudad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiudad0()
    {
        return $this->hasOne(Ciudades::className(), ['id' => 'ciudad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanes()
    {
        return $this->hasMany(Plane::className(), ['direccion' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioxdias()
    {
        return $this->hasMany(Servicioxdia::className(), ['direccion' => 'id']);
    }
}
