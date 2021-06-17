<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "software_service".
 *
 * @property int $id
 * @property int|null $id_software
 * @property int|null $id_service
 *
 * @property Order[] $orders
 * @property Service $service
 * @property Software $software
 */
class SoftwareService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'software_service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_software', 'id_service'], 'integer'],
            [['id_service'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(), 'targetAttribute' => ['id_service' => 'id']],
            [['id_software'], 'exist', 'skipOnError' => true, 'targetClass' => Software::className(), 'targetAttribute' => ['id_software' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_software' => 'Id Software',
            'id_service' => 'Id Service',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['id_software_service' => 'id']);
    }

    /**
     * Gets query for [[Service]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::className(), ['id' => 'id_service']);
    }

    /**
     * Gets query for [[Software]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSoftware()
    {
        return $this->hasOne(Software::className(), ['id' => 'id_software']);
    }
}
