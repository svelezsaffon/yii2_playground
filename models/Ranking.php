<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ranking".
 *
 * @property int $id
 * @property int $idservicio
 * @property int $idtrabajador
 * @property int $puntuacion
 * @property string $comentario
 */
class Ranking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ranking';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idservicio', 'idtrabajador'], 'required'],
            [['idservicio', 'idtrabajador', 'puntuacion'], 'integer'],
            [['comentario'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idservicio' => 'Idservicio',
            'idtrabajador' => 'Idtrabajador',
            'puntuacion' => 'Puntuacion',
            'comentario' => 'Comentario',
        ];
    }
}
