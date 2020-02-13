<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "costos".
 *
 * @property int $servicio
 * @property int $ciudad
 * @property int $horario
 * @property double $valor
 * @property int $id
 *
 * @property Servicios $servicio0
 * @property Ciudades $ciudad0
 * @property Horarios $horario0
 */
class Costos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'costos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['servicio', 'ciudad', 'horario', 'valor'], 'required'],
            [['servicio', 'ciudad', 'horario'], 'integer'],
            [['valor'], 'number'],
            [['servicio'], 'exist', 'skipOnError' => true, 'targetClass' => Servicios::className(), 'targetAttribute' => ['servicio' => 'id']],
            [['ciudad'], 'exist', 'skipOnError' => true, 'targetClass' => Ciudades::className(), 'targetAttribute' => ['ciudad' => 'id']],
            [['horario'], 'exist', 'skipOnError' => true, 'targetClass' => Horarios::className(), 'targetAttribute' => ['horario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'servicio' => 'Servicio',
            'ciudad' => 'Ciudad',
            'horario' => 'Horario',
            'valor' => 'Valor',
            'id' => 'ID',
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
    public function getCiudad0()
    {
        return $this->hasOne(Ciudades::className(), ['id' => 'ciudad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorario0()
    {
        return $this->hasOne(Horarios::className(), ['id' => 'horario']);
    }
}
