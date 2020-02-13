<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "configuracionservicioseller".
 *
 * @property int $servicio
 * @property int $horario
 * @property int $user
 * @property int $id
 * @property double $valor
 * @property int $ciudad
 *
 * @property Ciudades $ciudad0
 * @property Servicios $servicio0
 * @property Horarios $horario0
 * @property User $user0
 */
class Configuracionservicioseller extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'configuracionservicioseller';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['servicio', 'horario', 'user', 'valor', 'ciudad'], 'required'],
            [['servicio', 'horario', 'user', 'ciudad'], 'integer'],
            [['valor'], 'number'],
            [['ciudad'], 'exist', 'skipOnError' => true, 'targetClass' => Ciudades::className(), 'targetAttribute' => ['ciudad' => 'id']],
            [['servicio'], 'exist', 'skipOnError' => true, 'targetClass' => Servicios::className(), 'targetAttribute' => ['servicio' => 'id']],
            [['horario'], 'exist', 'skipOnError' => true, 'targetClass' => Horarios::className(), 'targetAttribute' => ['horario' => 'id']],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'servicio' => 'Servicio',
            'horario' => 'Horario',
            'user' => 'User',
            'id' => 'ID',
            'valor' => 'Valor',
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
    public function getServicio0()
    {
        return $this->hasOne(Servicios::className(), ['id' => 'servicio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorario0()
    {
        return $this->hasOne(Horarios::className(), ['id' => 'horario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'user']);
    }
}
