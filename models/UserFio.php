<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_fio".
 *
 * @property int $id
 * @property int|null $id_user
 * @property int|null $id_fio
 *
 * @property Fio $fio
 * @property User $user
 */
class UserFio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_fio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_fio'], 'integer'],
            [['id_fio'], 'exist', 'skipOnError' => true, 'targetClass' => Fio::className(), 'targetAttribute' => ['id_fio' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_fio' => 'Id Fio',
        ];
    }

    /**
     * Gets query for [[Fio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFio()
    {
        return $this->hasOne(Fio::className(), ['id' => 'id_fio']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
