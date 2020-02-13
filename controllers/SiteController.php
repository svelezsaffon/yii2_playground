<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\data\SqlDataProvider;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Servicios;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use app\models\UserInfo;
use app\models\Direccion;
use app\models\User;
use app\models\Plane;
use app\models\ResetPasswordForm;
use app\models\PasswordResetRequestForm;
use app\models\Cuentaverificada;
use yii\helpers\Url;
use app\models\FacebookData;

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
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'oAuthSuccess'],
            ],
        ];
    }

    public function actionEror($name,$message){
        return $this->render('error',[
            'name' => $name,
            'message'=>$message,
        ]);
    }

public function oAuthSuccess($client) {
  // get user data from client
  $userAttributes = $client->getUserAttributes();

  // do some thing with user data. for example with $userAttributes['email']

    $model = new SignupForm(); 
    $model->username=$userAttributes['name'];
    $model->email=$userAttributes['email'];
    $model->password="thisisonelargepassword";

    if ($user = $model->signup()) {     
        if (Yii::$app->getUser()->login($user)) {  

            $facebook=new FacebookData();

            $facebook->user=$user->id;
            $facebook->first_name=$model->username;
            $facebook->email=$model->email;
            $facebook->save();

            return $this->goHome();
        }
    }else{
        $userinfo2= User::find()->where(['email'=>$userAttributes['email']])->one();
        if (Yii::$app->getUser()->login($userinfo2)) {                                    
                return $this->goHome();
        }   
    }
}    

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
         $servicioModel = Servicios::find()->all();
         $model = new SignupForm(); 


        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {                                    
                    return $this->goHome();
                }
            }
        }


        $login_model = new LoginForm();

        if ($login_model->load(Yii::$app->request->post()) && $login_model->login()) {
            
            return $this->goBack();
            
        }else if(Yii::$app->user->isGuest){
            
            return $this->render('index',['allServicios'=>$servicioModel,'model'=>$model,'login_model'=>$login_model]);   

         }else if(Yii::$app->user->can('user')){

            $userinfo= UserInfo::find()->where(['user'=>Yii::$app->user->id])->one();
            $cuentaver= Cuentaverificada::find()->where(['user'=>Yii::$app->user->id])->one(); 
            $servername=Url::to(['cuentaverificada/verify', 'hash' => $cuentaver->hash]);                                

            $verificar=false;
            if($cuentaver==null){
                $verificar=false;
            }else{
                $verificar=$cuentaver->verificada==0 ? false:true;
            }
            return $this->render('index',
                [   'allServicios'=>$servicioModel,
                    'userinfo'=>$userinfo,
                    'cuentaver'=>$verificar,
                    'upuser'=>$userinfo==NULL?true:false,
                    'linkcuenta'=>$servername
                ]);            
         }else if(Yii::$app->user->can('seller')){
/*
$query = new yii\db\Query;
         $query->select(['icono'=>'servicios.icon','fecha'=>'fecha_inicia','dir'=>'direccion.direccion','horario'=>'horarios.descripcion','costo'=>'costos.valor','servicio_id'=>'servicioxdia.id','ref'=>'puntos_referencia','ciudad'=>'ciudades.nombre'])
                ->from(['servicios','servicioxdia','direccion','horarios','costos','ciudades'])
                ->where('servicioxdia.trabajador=:iduser', [':iduser' => Yii::$app->user->id])
                ->andWhere('servicioxdia.servicio=servicios.id')
                ->andWhere('servicioxdia.direccion = direccion.id')
                ->andWhere('servicioxdia.tiempo = horarios.id')
                ->andWhere('servicioxdia.servicio=costos.servicio')
                ->andWhere('servicioxdia.trabajador = costos.trabajador')
                ->andWhere('direccion.ciudad = ciudades.id');            
*/
        
          $query='SELECT DISTINCT servicioxdia.id as servicio_id, servicios.icon as icono,fecha_inicia as fecha,direccion.direccion as dir,horarios.descripcion as horario,costos.valor as costo,  puntos_referencia as ref,ciudades.nombre as ciudad, seller_accepted as acpt FROM servicios,servicioxdia,direccion,horarios,costos,ciudades  WHERE servicioxdia.trabajador='.Yii::$app->user->id.' AND servicioxdia.servicio=servicios.id AND servicioxdia.direccion = direccion.id AND servicioxdia.tiempo = horarios.id AND servicioxdia.servicio=costos.servicio and servicioxdia.trabajador = costos.trabajador AND direccion.ciudad = ciudades.id';
        
            $provider = Yii::$app->db->createCommand($query)->queryAll();

            $userinfo= UserInfo::find()->where(['user'=>Yii::$app->user->id])->one();
            $cuentaver= Cuentaverificada::find()->where(['user'=>Yii::$app->user->id])->one(); 
            $servername=Url::to(['cuentaverificada/verify', 'hash' => $cuentaver->hash]);                                

            $verificar=false;
            if($cuentaver==null){
                $verificar=false;
            }else{
                $verificar=$cuentaver->verificada==0 ? false:true;
            }
            return $this->render('index',
                [   'allServicios'=>$servicioModel,
                    'servicios_prestar'=>$provider,
                    'userinfo'=>$userinfo,
                    'cuentaver'=>$verificar,
                    'upuser'=>$userinfo==NULL?true:false,
                    'linkcuenta'=>$servername
                ]);  

        }
         

        
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
     * Logout action.
     *
     * @return Response
     */
    public function actionLegal()
    {
        return $this->render('legal');
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
     * Signs user up. 
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm(); 
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {     

                if (Yii::$app->getUser()->login($user)) {
                                    
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
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


    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }




    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }    

}
