<?php

namespace app\controllers;

use app\models\News;
use app\models\UploadImage;
use Yii;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class NewsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index', [
            'obNews' => News::find()->all(),
        ]);
    }

    public function actionView()
    {
        if (!($nId = $this->request->get('id'))) {
            throw new HttpException(404, 'The requested page does not exist.');
        }
        return $this->render('view', [
            'obNews' => News::findOne(['id' => $nId])
        ]);
    }

    public function actionUpload()
    {
        $model = new UploadImage();
        if (Yii::$app->request->isPost) {
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->upload();
            return $this->render('upload', ['model' => $model]);
        }
        return $this->render('upload', ['model' => $model]);
    }

    public function actionCreate()
    {
        $model = new \app\models\News();
        $upload = new UploadImage();
        if ($this->request->isGet) {
            return $this->render('create', [
                'model' => $model,
                'upload' => $upload,
            ]);
        }
        $model->load(Yii::$app->request->post());
        if (!$model->validate()) {
            $this->goBack();
        }
        $upload->image = UploadedFile::getInstance($upload, 'image');
        $model->preview = $upload->upload();
        $model->save();
        return $this->redirect('/news/view?id=' . $model->id);
    }

    public function actionUpdate()
    {
        if (!($nId = $this->request->get('id'))) {
            throw new HttpException(404, 'The requested page does not exist.');
        }
        $model = News::findOne(['id' => $nId]);
        $upload = new UploadImage();
        if ($this->request->isGet) {
            return $this->render('update', [
                'model' => $model,
                'upload' => $upload,
            ]);
        }
        $model->load(Yii::$app->request->post());
        if (!$model->validate()) {
            $this->goBack();
        }
        $upload->image = UploadedFile::getInstance($upload, 'image');
        $model->preview = $upload->upload();
        $model->save();
        return $this->redirect('/news/view?id=' . $model->id);
    }

}
