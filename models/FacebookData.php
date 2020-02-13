<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "facebook_data".
 *
 * @property int $user
 * @property string $first_name
 * @property string $lasta_name
 * @property string $email
 *
 * @property User $user0
 */
class FacebookData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'facebook_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user', 'first_name', 'email'], 'required'],
            [['user'], 'integer'],
            [['first_name', 'lasta_name', 'email'], 'string', 'max' => 255],
            [['user'], 'unique'],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user' => 'User',
            'first_name' => 'First Name',
            'lasta_name' => 'Lasta Name',
            'email' => 'Email',
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
