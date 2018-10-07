<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servicioxdia".
 *
 * @property int $id
 * @property int $user
 * @property int $direccion
 * @property int $servicio
 * @property int $trabajador
 * @property string $tiempo
 * @property string $fecha_inicia
 *
 * @property Trabajador $trabajador0
 * @property User $user0
 * @property Direccion $direccion0
 * @property Servicios $servicio0
 */
class Servicioxdia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'servicioxdia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user', 'direccion', 'servicio', 'trabajador', 'tiempo', 'fecha_inicia'], 'required'],
            [['user', 'direccion', 'servicio', 'trabajador'], 'integer'],
            [['fecha_inicia'], 'safe'],
            [['tiempo'], 'string', 'max' => 10],
            [['trabajador'], 'exist', 'skipOnError' => true, 'targetClass' => Trabajador::className(), 'targetAttribute' => ['trabajador' => 'id']],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user' => 'id']],
            [['direccion'], 'exist', 'skipOnError' => true, 'targetClass' => Direccion::className(), 'targetAttribute' => ['direccion' => 'id']],
            [['servicio'], 'exist', 'skipOnError' => true, 'targetClass' => Servicios::className(), 'targetAttribute' => ['servicio' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'direccion' => 'Direccion',
            'servicio' => 'Servicio',
            'trabajador' => 'Trabajador',
            'tiempo' => 'Tiempo',
            'fecha_inicia' => 'Fecha Inicia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrabajador0()
    {
        return $this->hasOne(Trabajador::className(), ['id' => 'trabajador']);
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
    public function getDireccion0()
    {
        return $this->hasOne(Direccion::className(), ['id' => 'direccion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicio0()
    {
        return $this->hasOne(Servicios::className(), ['id' => 'servicio']);
    }
}
