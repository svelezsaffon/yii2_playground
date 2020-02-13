<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cuentaverificada".
 *
 * @property int $id
 * @property int $user
 * @property string $fecha
 * @property string $hash
 * @property int $verificada
 *
 * @property User $user0
 */
class Cuentaverificada extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cuentaverificada';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user', 'hash'], 'required'],
            [['user', 'verificada'], 'integer'],
            [['fecha'], 'safe'],
            [['hash'], 'string'],
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
            'fecha' => 'Fecha',
            'hash' => 'Hash',
            'verificada' => 'Verificada',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'user']);
    }
}
