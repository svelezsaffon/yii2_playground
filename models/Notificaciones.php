<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notificaciones".
 *
 * @property int $id
 * @property int $para
 * @property int $de
 * @property string $titulo
 * @property string $texto
 * @property int $leida
 * @property string $link
 *
 * @property User $para0
 */
class Notificaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notificaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['para', 'de', 'leida'], 'integer'],
            [['titulo', 'texto'], 'required'],
            [['texto'], 'string'],
            [['titulo'], 'string', 'max' => 125],
            [['link'], 'string', 'max' => 255],
            [['para'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['para' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'para' => 'Para',
            'de' => 'De',
            'titulo' => 'Titulo',
            'texto' => 'Texto',
            'leida' => 'Leida',
            'link' => 'Link',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPara0()
    {
        return $this->hasOne(User::className(), ['id' => 'para']);
    }
}
