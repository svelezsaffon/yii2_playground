<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "convenios_pago".
 *
 * @property int $id
 * @property string $nombre
 * @property string $valor
 * @property string $descripcion
 * @property string $image
 *
 * @property Pago[] $pagos
 */
class ConveniosPago extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'convenios_pago';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'valor', 'image'], 'required'],
            [['valor'], 'number'],
            [['descripcion'], 'string'],
            [['nombre'], 'string', 'max' => 150],
            [['image'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'valor' => 'Valor',
            'descripcion' => 'Descripcion',
            'image' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pago::className(), ['metodo' => 'id']);
    }
}
