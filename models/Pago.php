<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pago".
 *
 * @property int $id
 * @property string $fecha_pago
 * @property int $user
 * @property int $servicioxdia
 * @property int $plan
 * @property string $plandia
 * @property string $monto
 * @property string $descripcion
 * @property string $extratransferencia
 * @property int $metodo
 *
 * @property ConveniosPago $metodo0
 * @property User $user0
 * @property Servicioxdia $servicioxdia0
 * @property Plane $plan0
 */
class Pago extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pago';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_pago', 'user', 'plandia', 'monto', 'metodo'], 'required'],
            [['fecha_pago', 'plandia'], 'safe'],
            [['user', 'servicioxdia', 'plan', 'metodo'], 'integer'],
            [['monto'], 'number'],
            [['descripcion', 'extratransferencia'], 'string'],
            [['metodo'], 'exist', 'skipOnError' => true, 'targetClass' => ConveniosPago::className(), 'targetAttribute' => ['metodo' => 'id']],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user' => 'id']],
            [['servicioxdia'], 'exist', 'skipOnError' => true, 'targetClass' => Servicioxdia::className(), 'targetAttribute' => ['servicioxdia' => 'id']],
            [['plan'], 'exist', 'skipOnError' => true, 'targetClass' => Plane::className(), 'targetAttribute' => ['plan' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha_pago' => 'Fecha Pago',
            'user' => 'User',
            'servicioxdia' => 'Servicioxdia',
            'plan' => 'Plan',
            'plandia' => 'Plandia',
            'monto' => 'Monto',
            'descripcion' => 'Descripcion',
            'extratransferencia' => 'Extratransferencia',
            'metodo' => 'Metodo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMetodo0()
    {
        return $this->hasOne(ConveniosPago::className(), ['id' => 'metodo']);
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
    public function getServicioxdia0()
    {
        return $this->hasOne(Servicioxdia::className(), ['id' => 'servicioxdia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlan0()
    {
        return $this->hasOne(Plane::className(), ['id' => 'plan']);
    }
}
