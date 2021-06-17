<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fn".
 *
 * @property int $id
 * @property string|null $title
 *
 * @property Fio[] $fios
 */
class FirstName extends \yii\db\ActiveRecord
{
    use CheckToExistFioAttributes;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fn';
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
            'title' => 'Имя',
        ];
    }

    /**
     * Gets query for [[Fios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFios()
    {
        return $this->hasMany(Fio::className(), ['id_fn' => 'id']);
    }
}
