<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "software".
 *
 * @property int $id
 * @property string|null $title
 *
 * @property SoftwareService[] $softwareServices
 */
class Software extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'software';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[SoftwareServices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSoftwareServices()
    {
        return $this->hasMany(SoftwareService::className(), ['id_software' => 'id']);
    }
}
