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
 *
 * @property User $user0
 */
class Direccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'direccion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user', 'direccion', 'nombre'], 'required'],
            [['user'], 'integer'],
            [['direccion', 'puntos_referencia', 'quien_recibe'], 'string'],
            [['nombre'], 'string', 'max' => 200],            
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user' => 'id']],
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
            'nombre' => 'Nombre',
            'puntos_referencia' => 'Puntos Referencia',
            'quien_recibe' => 'Quien Recibe',
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
