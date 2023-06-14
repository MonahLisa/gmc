<?php

namespace app\controllers;

use app\models\SignupForm;
use Yii;
use yii\base\Exception;
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
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionAdministration()
    {
        return $this->render('administration');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionServices()
    {
        return $this->render('services');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionDocuments()
    {
        return $this->render('documents');
    }



    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionNotification()
    {
        return $this->render('notification');
    }




    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionPage()
    {
        return $this->render('page');
    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionAdmin()
    {
        return $this->render('admin');
    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionProfile()
    {
        return $this->render('profile');
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

    /**
     * @throws Exception
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {

                    $userRole = Yii::$app->authManager->getRole('user');
                    Yii::$app->authManager->assign($userRole, \Yii::$app->user->id);

                    return $this->redirect(["site/index"]);
                }
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
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

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }




    public function actionRole()
    {
//        $admin = Yii::$app -> AuthManager -> createRole('admin');
//        $admin -> description = 'Администратор';
//        Yii::$app -> AuthManager -> add($admin);

//        $moder = Yii::$app -> AuthManager -> createRole('moder');
//        $moder -> description = 'Модератор';
//        Yii::$app -> AuthManager -> add($moder);

//        $moder_db = Yii::$app -> AuthManager -> createRole('database_service_moder');
//        $moder_db -> description = 'Модератор отдела баз данных';
//        Yii::$app -> AuthManager -> add($moder_db);

//        $moder_api = Yii::$app -> AuthManager -> createRole('api_service_moder');
//        $moder_api -> description = 'Модератор отдела api-сервиса';
//        Yii::$app -> AuthManager -> add($moder_api);

//        $moder_counterparties = Yii::$app -> AuthManager -> createRole('counterparties_service_moder');
//        $moder_counterparties -> description = 'Модератор отдела контрагентов';
//        Yii::$app -> AuthManager -> add($moder_counterparties);

//        $moder_references = Yii::$app -> AuthManager -> createRole('references_service_moder');
//        $moder_references -> description = 'Модератор отдела справочников';
//        Yii::$app -> AuthManager -> add($moder_references);

//        $moder_marketing = Yii::$app -> AuthManager -> createRole('marketing_service_moder');
//        $moder_marketing -> description = 'Модератор отдела маркетинговых решений';
//        Yii::$app -> AuthManager -> add($moder_marketing);
//

//
//        $user = Yii::$app -> AuthManager -> createRole('user');
//        $user -> description = 'Пользователь';
//        Yii::$app -> AuthManager -> add($user);
//
//        $ban = Yii::$app -> AuthManager -> createRole('banned');
//        $ban -> description = 'Заблокированный пользователь';
//        Yii::$app -> AuthManager -> add($ban);
//
//        $permit = Yii::$app->authManager->createPermission('adminPanel');
//        $permit->description = 'Право входа в админ-панель';
//        Yii::$app->authManager->add($permit);
//
//        $role_a = Yii::$app->authManager->getRole('admin');
//        $role_m = Yii::$app->authManager->getRole('moder');
//        $role_m1 = Yii::$app->authManager->getRole('database_service_moder');
//        $role_m2 = Yii::$app->authManager->getRole('api_service_moder');
//        $role_m3 = Yii::$app->authManager->getRole('counterparties_service_moder');
//        $role_m4 = Yii::$app->authManager->getRole('references_service_moder');
//        $role_m5 = Yii::$app->authManager->getRole('marketing_service_moder');
//        $permit = Yii::$app->authManager->getPermission('adminPanel');
//        Yii::$app->authManager->addChild($role_m5, $permit);
//
//        $permit = Yii::$app->authManager->createPermission('changeUserRoles');
//        $permit->description = 'Право менять роли пользователей';
//        Yii::$app->authManager->add($permit);

//        $role_a = Yii::$app->authManager->getRole('admin');
//        $permit = Yii::$app->authManager->getPermission('changeUserRoles');
//        Yii::$app->authManager->addChild($role_a, $permit);

//        $permit = Yii::$app->authManager->createPermission('changeDatabaseService');
//        $permit->description = 'Право менять страницу сервиса баз данных';
//        Yii::$app->authManager->add($permit);

//        $permit = Yii::$app->authManager->createPermission('changeAPIService');
//        $permit->description = 'Право менять страницу API-сервиса';
//        Yii::$app->authManager->add($permit);

//        $permit = Yii::$app->authManager->createPermission('changeCounterpartiesService');
//        $permit->description = 'Право менять страницу сервиса контрагентов';
//        Yii::$app->authManager->add($permit);

//        $permit = Yii::$app->authManager->createPermission('changeReferencesService');
//        $permit->description = 'Право менять страницу сервиса справочников';
//        Yii::$app->authManager->add($permit);

//        $permit = Yii::$app->authManager->createPermission('changeMarketingService');
//        $permit->description = 'Право менять страницу сервиса маркетинговых решений';
//        Yii::$app->authManager->add($permit);
//        $role_a = Yii::$app->authManager->getRole('admin');
//        $role_m1 = Yii::$app->authManager->getRole('database_service_moder');
//        $role_m2 = Yii::$app->authManager->getRole('api_service_moder');
//        $role_m3 = Yii::$app->authManager->getRole('counterparties_service_moder');
//        $role_m4 = Yii::$app->authManager->getRole('references_service_moder');
//        $role_m5 = Yii::$app->authManager->getRole('marketing_service_moder');
//        $permit1 = Yii::$app->authManager->getPermission('changeDatabaseService');
//        $permit2 = Yii::$app->authManager->getPermission('changeAPIService');
//        $permit3 = Yii::$app->authManager->getPermission('changeCounterpartiesService');
//        $permit4 = Yii::$app->authManager->getPermission('changeReferencesService');
//        $permit5 = Yii::$app->authManager->getPermission('changeMarketingService');
//        Yii::$app->authManager->addChild($role_m1, $permit1);
//        Yii::$app->authManager->addChild($role_m2, $permit2);
//        Yii::$app->authManager->addChild($role_m3, $permit3);
//        Yii::$app->authManager->addChild($role_m4, $permit4);
//        Yii::$app->authManager->addChild($role_m5, $permit5);
//
//        Yii::$app->authManager->addChild($role_a, $permit1);
//        Yii::$app->authManager->addChild($role_a, $permit2);
//        Yii::$app->authManager->addChild($role_a, $permit3);
//        Yii::$app->authManager->addChild($role_a, $permit4);
//        Yii::$app->authManager->addChild($role_a, $permit5);
//

//        $permit = Yii::$app->authManager->createPermission('addNotification');
//        $permit->description = 'Право добавлять извещения';
//        Yii::$app->authManager->add($permit);

//        $permit = Yii::$app->authManager->createPermission('addDocuments');
//        $permit->description = 'Право добавлять документы';
//        Yii::$app->authManager->add($permit);

//        $role_a = Yii::$app->authManager->getRole('admin');
//        $role_m = Yii::$app->authManager->getRole('moder');
//        $permit1 = Yii::$app->authManager->getPermission('addNotification');
//        $permit2 = Yii::$app->authManager->getPermission('addDocuments');
//        Yii::$app->authManager->addChild($role_a, $permit1);
//        Yii::$app->authManager->addChild($role_a, $permit2);
//        Yii::$app->authManager->addChild($role_m, $permit1);
//        Yii::$app->authManager->addChild($role_m, $permit2);



//        $permit = Yii::$app->authManager->createPermission('redactGMCPage');
//        $permit->description = 'Право редактировать страницу ГМЦ Росстата';
//        Yii::$app->authManager->add($permit);
//
//        $role_a = Yii::$app->authManager->getRole('admin');
//        $role_m = Yii::$app->authManager->getRole('moder');
//        $permit1 = Yii::$app->authManager->getPermission('redactGMCPage');
//
//        Yii::$app->authManager->addChild($role_a, $permit1);
//        Yii::$app->authManager->addChild($role_m, $permit1);



//        $userRole = Yii::$app->authManager->getRole('admin');
//        Yii::$app->authManager->assign($userRole, 5);
        return 123;
    }


}
