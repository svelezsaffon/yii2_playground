<?php

namespace app\controllers;

use Yii;
use app\models\Configuracionservicioseller;
use app\models\ConfiguracionserviciosellerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Ciudades;
use app\models\Trabajadordesem;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use app\models\Servicioxdia;
use app\models\ServicioxdiaSearch;
use app\models\Servicios;
use app\models\Horarios;
use app\models\Direccion;
use app\models\Trabajador;
use app\models\Costos;
use yii\filters\AccessControl;
use app\models\Servicioxtrabajador;
use app\models\Pago;
use app\models\Cuentaverificada;
use app\models\Horarioxservicio;
use app\models\UserInfo;
use yii\helpers\Url;
use yii\helpers\Html;
/**
 * ConfiguracionserviciosellerController implements the CRUD actions for Configuracionservicioseller model.
 */
class ConfiguracionserviciosellerController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Configuracionservicioseller models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConfiguracionserviciosellerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Configuracionservicioseller model.
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
     * Creates a new Configuracionservicioseller model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Configuracionservicioseller();
        $model->user=Yii::$app->user->id;   
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $desem= new Trabajadordesem();            
            $desem->servicio=$model->servicio;
            $desem->trabajador=$model->user;
            $desem->save();


            return $this->redirect(['view', 'id' => $model->id]);
        }

        if(Yii::$app->user->can('seller')){ 
            
            $lista_horarios = Horarios::find()->all();

            $lista_servicios = Servicios::find()->all();

            $userinfo= UserInfo::find()->where(['user'=>Yii::$app->user->id])->one();
            $ciudades= Ciudades::find()->where(['habilitada'=>1])->all();

            return $this->render('create', [
                   'model' => $model,'ciudades'=>$ciudades,'lista_servicios'=>$lista_servicios,'userinfo'=>$userinfo,'lista_horarios'=>$lista_horarios
                ,
            ]);
        }  


    }

    /**
     * Updates an existing Configuracionservicioseller model.
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
     * Deletes an existing Configuracionservicioseller model.
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
     * Finds the Configuracionservicioseller model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Configuracionservicioseller the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Configuracionservicioseller::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
