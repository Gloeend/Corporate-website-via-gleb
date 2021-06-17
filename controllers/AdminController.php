<?php

namespace app\controllers;

use app\models\Order;
use app\models\Status;
use app\models\User;

class AdminController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index', [
            'obOrdersInWait' => Order::find()->where(['id_status' => Status::findOne(['title' => 'В ожидании'])->id])->all(),
            'obOrdersInAccept' => Order::find()->where(['id_status' => Status::findOne(['title' => 'Одобрено'])->id])->all(),
            'obUsers' => User::find()->all(),
        ]);
    }

    public function actionAccept(): \yii\web\Response
    {
        if (!isset(($arGet = $this->request->get())['id'])) {
            return $this->goBack();
        }
        Order::findOne(['id' => $arGet['id']])->accept();
        return $this->redirect('/admin');
    }

    public function actionDeny(): \yii\web\Response
    {
        if (!isset(($arGet = $this->request->get())['id'])) {
            return $this->goBack();
        }
        Order::findOne(['id' => $arGet['id']])->deny();
        return $this->redirect('/admin');
    }

}
