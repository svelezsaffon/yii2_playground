<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aplicacion_trabajos".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellidos
 * @property string $info
 * @property string $telefono
 * @property string $email
 */
class AplicacionTrabajos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aplicacion_trabajos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellidos', 'info', 'telefono', 'email'], 'required'],
            [['info' ], 'string'],
            [['nombre','telefono', 'apellidos'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 255],
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
            'apellidos' => 'Apellidos',
            'info' => 'Info',
            'telefono' => 'Telefono',
            'email' => 'Email',
        ];
    }
}
