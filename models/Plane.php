<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plane".
 *
 * @property int $id
 * @property int $servicio
 * @property int $user
 * @property int $trabajador
 * @property int $semanal
 * @property string $fecha_inicia
 * @property string $fecha_creacion
 * @property int $lunes
 * @property int $martes
 * @property int $miercoles
 * @property int $jueves
 * @property int $viernes
 * @property int $sabado
 * @property int $domingo
 * @property int $direccion
 * @property string $timepo
 *
 * @property Servicios $servicio0
 * @property User $user0
 * @property Direccion $direccion0
 * @property Trabajador $trabajador0
 */
class Plane extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plane';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['servicio', 'user', 'trabajador', 'semanal', 'fecha_inicia', 'fecha_creacion', 'direccion', 'timepo'], 'required'],
            [['servicio', 'user', 'trabajador', 'direccion'], 'integer'],
            [['fecha_inicia', 'fecha_creacion'], 'safe'],
            [['semanal', 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'], 'string', 'max' => 1],
            [['timepo'], 'string', 'max' => 10],
            [['servicio'], 'exist', 'skipOnError' => true, 'targetClass' => Servicios::className(), 'targetAttribute' => ['servicio' => 'id']],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user' => 'id']],
            [['direccion'], 'exist', 'skipOnError' => true, 'targetClass' => Direccion::className(), 'targetAttribute' => ['direccion' => 'id']],
            [['trabajador'], 'exist', 'skipOnError' => true, 'targetClass' => Trabajador::className(), 'targetAttribute' => ['trabajador' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'servicio' => 'Servicio',
            'user' => 'User',
            'trabajador' => 'Trabajador',
            'semanal' => 'Semanal',
            'fecha_inicia' => 'Fecha Inicia',
            'fecha_creacion' => 'Fecha Creacion',
            'lunes' => 'Lunes',
            'martes' => 'Martes',
            'miercoles' => 'Miercoles',
            'jueves' => 'Jueves',
            'viernes' => 'Viernes',
            'sabado' => 'Sabado',
            'domingo' => 'Domingo',
            'direccion' => 'Direccion',
            'timepo' => 'Timepo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicio0()
    {
        return $this->hasOne(Servicios::className(), ['id' => 'servicio']);
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
    public function getTrabajador0()
    {
        return $this->hasOne(Trabajador::className(), ['id' => 'trabajador']);
    }
}