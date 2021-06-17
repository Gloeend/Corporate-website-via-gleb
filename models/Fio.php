<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fio".
 *
 * @property int $id
 * @property int|null $id_fn
 * @property int|null $id_ln
 * @property int|null $id_mn
 *
 * @property Fn $fn
 * @property Ln $ln
 * @property MiddleName $mn
 * @property UserFio[] $userFios
 */
class Fio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_fn', 'id_ln', 'id_mn'], 'integer'],
            [['id_fn'], 'exist', 'skipOnError' => true, 'targetClass' => FirstName::className(), 'targetAttribute' => ['id_fn' => 'id']],
            [['id_ln'], 'exist', 'skipOnError' => true, 'targetClass' => LastName::className(), 'targetAttribute' => ['id_ln' => 'id']],
            [['id_mn'], 'exist', 'skipOnError' => true, 'targetClass' => MiddleName::className(), 'targetAttribute' => ['id_mn' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_fn' => 'Id Fn',
            'id_ln' => 'Id Ln',
            'id_mn' => 'Id Mn',
        ];
    }

    /**
     * Gets query for [[Fn]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFn()
    {
        return $this->hasOne(FirstName::className(), ['id' => 'id_fn']);
    }

    /**
     * Gets query for [[Ln]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLn()
    {
        return $this->hasOne(LastName::className(), ['id' => 'id_ln']);
    }

    /**
     * Gets query for [[Mn]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMn()
    {
        return $this->hasOne(MiddleName::className(), ['id' => 'id_mn']);
    }

    /**
     * Gets query for [[UserFios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserFios()
    {
        return $this->hasMany(UserFio::className(), ['id_fio' => 'id']);
    }
}
