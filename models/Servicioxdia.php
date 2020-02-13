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
 * @property int $seller_accepted
 *
 * @property Pago[] $pagos
 * @property Ranking[] $rankings
 * @property User $user0
 * @property Direccion $direccion0
 * @property Servicios $servicio0
 * @property Trabajador $trabajador0
 */
class Servicioxdia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'servicioxdia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user', 'direccion', 'servicio', 'trabajador', 'tiempo', 'fecha_inicia'], 'required'],
            [['user', 'direccion', 'servicio', 'trabajador', 'seller_accepted'], 'integer'],
            [['fecha_inicia'], 'safe'],
            [['tiempo'], 'string', 'max' => 10],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user' => 'id']],
            [['direccion'], 'exist', 'skipOnError' => true, 'targetClass' => Direccion::className(), 'targetAttribute' => ['direccion' => 'id']],
            [['servicio'], 'exist', 'skipOnError' => true, 'targetClass' => Servicios::className(), 'targetAttribute' => ['servicio' => 'id']],
            [['trabajador'], 'exist', 'skipOnError' => true, 'targetClass' => Trabajador::className(), 'targetAttribute' => ['trabajador' => 'id']],
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
            'servicio' => 'Servicio',
            'trabajador' => 'Trabajador',
            'tiempo' => 'Tiempo',
            'fecha_inicia' => 'Fecha Inicia',
            'seller_accepted' => 'Seller Accepted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pago::className(), ['servicioxdia' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRankings()
    {
        return $this->hasMany(Ranking::className(), ['idservicio' => 'id']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrabajador0()
    {
        return $this->hasOne(Trabajador::className(), ['id' => 'trabajador']);
    }
}
