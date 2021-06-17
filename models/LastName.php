<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ln".
 *
 * @property int $id
 * @property string|null $title
 *
 * @property Fio[] $fios
 */
class LastName extends \yii\db\ActiveRecord
{
    use CheckToExistFioAttributes;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ln';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['title', 'required'],
            [['title'], 'string', 'max' => 127],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Фамилия',
        ];
    }

    /**
     * Gets query for [[Fios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFios()
    {
        return $this->hasMany(Fio::className(), ['id_ln' => 'id']);
    }
}
