<?php

namespace app\controllers;

use app\models\Fio;
use app\models\FirstName;
use app\models\LastName;
use app\models\MiddleName;
use app\models\News;
use app\models\Role;
use app\models\User;
use app\models\UserFio;
use app\models\UserRole;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /*
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', ['obNews' => News::find()->all()]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegister()
    {
        $obModel = new User();
        $obFn = new FirstName();
        $obLn = new LastName();
        $obMn = new MiddleName();
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        if ($this->request->method !== 'POST') {
            return $this->render('register', [
                'model' => $obModel,
                'fn' => $obFn,
                'ln' => $obLn,
                'mn' => $obMn,
            ]);
        }
        $arPost = Yii::$app->request->post();

        if (
            $obModel->load($arPost) && $obModel->validate() && $obModel->save() &&
            $obFn->load($arPost) && $obFn->validate() &&
            $obLn->load($arPost) && $obLn->validate() &&
            $obMn->load($arPost) && $obMn->validate()
        ) {
            $obFio = new Fio();
            $obUserFio = new UserFio();

            $obUserRole = new UserRole();
            $obUserRole->id_user = $obModel->id;
            $obUserRole->id_role = Role::findOne(['title' => 'user'])->id;
            $obUserRole->save();

            $obFio->id_fn = $obFn->check($obFn->title, 'title');
            $obFio->id_ln = $obLn->check($obLn->title, 'title');
            $obFio->id_mn = $obMn->check($obMn->title, 'title');
            $obFio->save();

            $obUserFio->id_user = $obModel->id;
            $obUserFio->id_fio = $obFio->id;
            $obUserFio->save();


            return $this->redirect('/site/login');
        } else {
            $this->goBack();
        }
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
