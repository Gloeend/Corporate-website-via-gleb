<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadImage extends Model
{

    public $image;

    public function rules()
    {
        return [
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $sFilename = \Yii::$app->security->generateRandomString(16) . $this->image->extension;
            $this->image->saveAs("uploads/{$sFilename}");
            return 'uploads/' . $sFilename;
        } else {
            return false;
        }
    }

}
