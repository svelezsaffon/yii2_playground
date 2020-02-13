<?php

namespace app\controllers;

use Yii;
use app\models\FacebookData;
use app\models\Cuentaverificada;
use app\models\CuentaverificadaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UserInfo;
use yii\filters\AccessControl;
use yii\helpers\Url;
use app\models\User;
/**
 * CuentaverificadaController implements the CRUD actions for Cuentaverificada model.
 */
class CuentaverificadaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
        'access'=>[
        'class'=>AccessControl::className(),
        'only'=>['create','update','index','delete','view'],
        'rules'=>[
        [
        'allow'=>true,
        'roles'=>['@']
        ]
        ]
        ],
        'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
        'delete' => ['POST'],
        ],
        ],
        ];
    }

    /**
     * Lists all Cuentaverificada models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CuentaverificadaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSendemail(){

        $cuenta= Cuentaverificada::find()->where(['user'=>Yii::$app->user->id])->one();         
        $user= User::find()->where(['id'=>Yii::$app->user->id])->one(); 
        //$servername='http://www.servicio247.co'.Url::to(['cuentaverificada/verify', 'hash' => $cuenta->hash]);                                
        $servername=Yii::$app->urlManager->createAbsoluteUrl(['cuentaverificada/verify', 'hash' => $cuenta->hash]);

                Yii::$app->mailer->compose('layouts/register', ['content' => $servername])
                ->setFrom('notificaciones@servicio247.co')
                ->setTo($user->email)
                ->setSubject("Bienvenido a servicio 247")
                ->send();
    }        

    /**
     * Displays a single Cuentaverificada model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Cuentaverificada model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cuentaverificada();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }


        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionVerify($hash)
    {


        $model = Cuentaverificada::find()->where(['hash' => $hash])->one();

        if($model->user==Yii::$app->user->id){

            $model->verificada = true;

            $model->save();

            $model = new UserInfo();

            return $this->redirect(['//user-info/create', 'model' => $model]);              
        }else{

            return $this->redirect(['//site/eror','name'=>'Usuario diferente','message'=>'Parece que el usuario que quieres verificar es diferente al que tienes una session inciada. Has logout y luego login con el usuario que quieres verificar']);              
        }


    }


    /**
     * Updates an existing Cuentaverificada model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cuentaverificada model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cuentaverificada model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cuentaverificada the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cuentaverificada::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
