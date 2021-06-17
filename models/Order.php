<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int|null $id_user
 * @property int|null $id_status
 * @property int|null $id_software_service
 * @property int|null $sum
 *
 * @property SoftwareService $softwareService
 * @property Status $status
 * @property User $user
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_status', 'id_software_service', 'sum'], 'integer'],
            [['id_software_service'], 'exist', 'skipOnError' => true, 'targetClass' => SoftwareService::className(), 'targetAttribute' => ['id_software_service' => 'id']],
            [['id_status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['id_status' => 'id']],
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
            'id_status' => 'Id Status',
            'id_software_service' => 'Id Software Service',
            'sum' => 'Sum',
        ];
    }

    /**
     * Gets query for [[SoftwareService]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSoftwareService()
    {
        return $this->hasOne(SoftwareService::className(), ['id' => 'id_software_service']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'id_status']);
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

    public function accept(): bool
    {
        if ($this->id_status !== Status::findOne(['title' => 'В ожидании'])->id) {
            return false;
        }
        $this->id_status = Status::findOne(['title' => 'Одобрено'])->id;
        $this->save();
        return true;
    }

    public function deny(): bool
    {
        if ($this->id_status !== Status::findOne(['title' => 'В ожидании'])->id) {
            return false;
        }
        $this->id_status = Status::findOne(['title' => 'Отказано'])->id;
        $this->save();
        return true;
    }
}
