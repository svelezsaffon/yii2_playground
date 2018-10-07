<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_info".
 *
 * @property int $id
 * @property int $user
 * @property string $nombre
 * @property string $telefono_fijo
 * @property string $cedula
 * @property string $celular
 * @property string $apellidos
 *
 * @property User $user0
 */
class UserInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user', 'nombre', 'cedula', 'apellidos'], 'required'],
            [['user'], 'integer'],
            [['nombre', 'apellidos'], 'string', 'max' => 100],
            [['telefono_fijo', 'cedula', 'celular'], 'string', 'max' => 50],
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
            'nombre' => 'Nombre',
            'telefono_fijo' => 'Telefono Fijo',
            'cedula' => 'Cedula',
            'celular' => 'Celular',
            'apellidos' => 'Apellidos',
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
