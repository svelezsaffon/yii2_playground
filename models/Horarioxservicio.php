<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "horarioxservicio".
 *
 * @property int $id_horario
 * @property int $id_servicio
 */
class Horarioxservicio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'horarioxservicio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_horario', 'id_servicio'], 'required'],
            [['id_horario', 'id_servicio'], 'integer'],
            [['id_horario', 'id_servicio'], 'unique', 'targetAttribute' => ['id_horario', 'id_servicio']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_horario' => 'Id Horario',
            'id_servicio' => 'Id Servicio',
        ];
    }


    public function getByTrabajo($idtrabajo){
        $query="SELECT horarios.id as id ,horarios.descripcion as descri FROM horarioxservicio,servicios,horarios WHERE horarioxservicio.id_horario=horarios.id AND horarioxservicio.id_servicio=servicios.id AND servicios.id=".$idtrabajo;

        return Yii::$app->db->createCommand($query)->queryAll();

    }
}
