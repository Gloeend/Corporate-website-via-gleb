<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_news".
 *
 * @property int $id
 * @property int|null $id_user
 * @property int|null $id_news
 *
 * @property News $news
 * @property User $user
 */
class UserNews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_news'], 'integer'],
            [['id_news'], 'exist', 'skipOnError' => true, 'targetClass' => News::className(), 'targetAttribute' => ['id_news' => 'id']],
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
            'id_news' => 'Id News',
        ];
    }

    /**
     * Gets query for [[News]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(News::className(), ['id' => 'id_news']);
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
