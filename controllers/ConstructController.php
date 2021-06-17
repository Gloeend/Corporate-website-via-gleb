<?php

namespace app\controllers;

use app\models\Order;
use app\models\Service;
use app\models\Software;
use app\models\SoftwareService;
use app\models\Status;
use yii\web\HttpException;

class ConstructController extends \yii\web\Controller
{
    /**
     * @return string
     */
    public function actionIndex(): string
    {
        return $this->render('index', [
            'obSoftware' => Software::find()->all(),
        ]);
    }

    /**
     * @return string
     * @throws HttpException
     */
    public function actionService(): string
    {
        if (!($nId = $this->request->get('software'))) {
            throw new HttpException(404, 'The requested page does not exist.');
        }
        return $this->render('service', [
            'obSoftwareService' => SoftwareService::findAll(['id_software' => $nId]),
        ]);
    }

    /**
     * @return string
     * @throws HttpException
     */
    public function actionSum(): string
    {
        if (!($nId = $this->request->get('software_service'))) {
            throw new HttpException(404, 'The requested page does not exist.');
        }
        return $this->render('sum', [
            'obSoftwareService' => SoftwareService::findOne(['id' => $nId]),
        ]);
    }

    public function actionStore()
    {
        if (!($nId = $this->request->get('software_service'))) {
            throw new HttpException(404, 'The requested page does not exist.');
        }
        $obOrder = new Order();
        $obOrder->id_software_service = $nId;
        $obOrder->sum = SoftwareService::findOne(['id' => $nId])->service->price;
        $obOrder->id_user = \Yii::$app->user->id;
        $obOrder->id_status = Status::findOne(['title' => 'В ожидании'])->id;
        if ($obOrder->save()) {
            return $this->redirect('/');
        }
    }

}
