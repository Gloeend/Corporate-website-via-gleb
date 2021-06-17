<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $price
 *
 * @property SoftwareService[] $softwareServices
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'integer'],
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
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[SoftwareServices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSoftwareServices()
    {
        return $this->hasMany(SoftwareService::className(), ['id_service' => 'id']);
    }
}
