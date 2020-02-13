<?php

namespace app\controllers;

use Yii;
use app\models\Costos;
use app\models\CostosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Horarioxservicio;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\UserInfo;
use app\models\Ciudades;
use app\models\Horarios;
use app\models\Servicios;
use yii\data\SqlDataProvider;
use app\models\Trabajadordesem;
/**
 * CostosController implements the CRUD actions for Costos model.
 */
class CostosController extends Controller
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
     * Lists all Costos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CostosSearch();
        
        $query='SELECT costos.id as id,horarios.descripcion as horario_desc, horarios.id as horario, ciudades.nombre as ciudad_nombre, ciudades.id as ciudad, servicios.id as servicio, servicios.nombre as servicios_nombre, valor FROM costos,servicios,ciudades,horarios WHERE costos.servicio=servicios.id AND costos.ciudad=ciudades.id AND costos.horario=horarios.id AND costos.trabajador='.Yii::$app->user->id;

        $provider = new SqlDataProvider(['sql' => $query,]);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $provider,
        ]);
    }

    /**
     * Displays a single Costos model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {


    $provider = (new \yii\db\Query())
                ->select(['icono'=>'servicios.icon','ciudad'=>'ciudades.nombre','horario'=>'horarios.descripcion','valor'=>'costos.valor','id'=>'costos.id'])
                ->from(['costos','servicios','ciudades','horarios'])
                ->where('costos.id=:idp', [':idp' => $id])
                ->andWhere('costos.servicio = servicios.id')
                ->andWhere('costos.horario = horarios.id')
                ->andWhere('costos.ciudad = ciudades.id')
                ->one();

        return $this->render('view', [
            'model' => $provider,
        ]);
    }

    /**
     * Creates a new Costos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Costos();

        $model->trabajador=Yii::$app->user->id;   
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $desem=new Trabajadordesem();
            $desem->servicio=$model->servicio;
            $desem->trabajador=$model->trabajador;
            $desem->save();

            /* 
            $horario= new Horarioxservicio();
            $horario->id_horario=$model->horario;
            $horario->id_servicio=$model->servicio;
            $horario->save();
            */


            return $this->redirect(['view', 'id' => $model->id]);
        }
        
        $ciudades= Ciudades::find()->where(['habilitada'=>1])->all();
        $horarios=Horarios::find()->all();
        $servicios=Servicios::find()->all();
        $userinfo= UserInfo::find()->where(['user'=>Yii::$app->user->id])->one();

        return $this->render('create', [
            'model' => $model,
            'ciudades'=>$ciudades,
            'horarios'=>$horarios,
            'servicios'=>$servicios,
        ]);
    }

    /**
     * Updates an existing Costos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

                        $desem= new Trabajadordesem();            
            $desem->servicio=$model->servicio;
            $desem->trabajador=$model->user;
            $desem->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
 
    /**
     * Deletes an existing Costos model.
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
     * Finds the Costos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Costos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Costos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
