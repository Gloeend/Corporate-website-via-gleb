<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $desc
 * @property string|null $preview
 *
 * @property UserNews[] $userNews
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['desc', 'preview'], 'string'],
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
            'title' => 'Заголовок',
            'desc' => 'Детальный текст',
            'preview' => 'Превью',
        ];
    }

    /**
     * Gets query for [[UserNews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserNews()
    {
        return $this->hasMany(UserNews::className(), ['id_news' => 'id']);
    }
}
