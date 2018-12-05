<?php

namespace app\controllers;

use Yii;
use app\models\Plane;
use app\models\Servicios;
use app\models\Direccion;
use app\models\Trabajador;
use app\models\PlaneSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Servicioxtrabajador;
/**
 * PlaneController implements the CRUD actions for Plane model.
 */
class PlaneController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Plane models.
     * @return mixed
     */
    public function actionIndex()

    {

        if(Yii::$app->user->can('admin')){

            $searchModel = new PlaneSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                
                ]);

        }else{


            $searchModel = new PlaneSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            $dir = Yii::$app->db->createCommand('SELECT plane.id, direccion.direccion as dir, direccion.nombre as dir_nombre, plane.fecha_inicia as fecha,plane.timepo as tiempo ,servicios.image as img, servicios.nombre as nombre,servicios.icon as icon FROM plane, servicios,direccion WHERE plane.user = '.Yii::$app->user->id.' and servicio= servicios.id and plane.direccion=direccion.id')->queryAll();

            return $this->render('index', [
                'planes'=>$dir,
                ]);

        }
    }

    /**
     * Displays a single Plane model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model=$this->findModel($id);

        $dir= Direccion::find()->where(['id' => $model->direccion])->one();
        $serv= Servicios::find()->where(['id' => $model->servicio])->one();
        $trab= Trabajador::find()->where(['id' => $model->trabajador])->one();

        $obj = (object) array(
            'id'=>$model->id,
            'tiempo'=>$model->timepo,
            'name'=>'Plan '.$serv->nombre.' que inicia '.$model->fecha_inicia,            
            'user'=>Yii::$app->user->id,
            'trabajador'=>$trab->nombre.' '.$trab->apellido,
            'servicio'=>$serv->nombre,
            'semanal'=>$model->semanal,
            'fecha_inicia'=>$model->fecha_inicia,
            'fecha_creacion'=>$model->fecha_creacion,
            'lunes'=>$model->lunes,
            'martes'=>$model->martes,
            'miercoles'=>$model->miercoles,
            'jueves'=>$model->jueves,
            'viernes'=>$model->viernes,
            'sabado'=>$model->sabado,
            'domingo'=>$model->domingo,
            'direccion'=>$dir->direccion,
            'desc'=>$serv->descripcion,
            'icon'=>$serv->icon, 
            );

        return $this->render('view', [
            'model' => $obj,
            ]);
    }

    /**
     * Creates a new Plane model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Plane();
        $model->user=Yii::$app->user->id;   
        $model->fecha_creacion=date("Y-m-d");
        $model->trabajador=6;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            return $this->redirect(['selecttra', 'id' => $model->id]);
        }


        $servicioModel = Servicios::find()->all();
        $direccionesModel = Direccion::find()->where(['user' => $model->user])->all();
        $trabajadorModel = Trabajador::find()->all();

        return $this->render('create', [
            'model' => $model, 'allServicios'=>$servicioModel,'direccionesModel'=>$direccionesModel,'trabajadorModel'=>$trabajadorModel
            ]);

    } 

    public function actionSelecttra($id)
    {


        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {

          if($model->save(false)){
            $asing=new Servicioxtrabajador();
            $asing->trabajador=intval($model->trabajador);
            $asing->servicio=intval($model->id);
            $asing->tipo='p';
            $asing->save();
            return $this->redirect(['view', 'id' => $model->id]);
          }
            
        }
        
       
        
        $query="SELECT trabajador.nombre as nombre, trabajador.cedula as cedula,trabajador.telefono as telefono,trabajador.apellido as apellido, trabajador.id as id FROM trabajador,trabajadordesem WHERE trabajador.id NOT IN(SELECT plane.trabajador FROM plane,pago WHERE plane.id=pago.servicioxdia and verificado=1 AND plane.fecha_inicia='".$model->fecha_inicia."') AND trabajador.id=trabajadordesem.trabajador AND trabajadordesem.servicio=".$model->servicio;

            $trabajadorModel = Yii::$app->db->createCommand($query)->queryAll();

        return $this->render('uptra', [
            'model' => $model,'trabajadorModel'=>$trabajadorModel,
            ]);
    }

    /**
     * Updates an existing Plane model.
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

        $servicioModel = Servicios::find()->all();
        $direccionesModel = Direccion::find()->all();
        $trabajadorModel = Trabajador::find()->all();

        return $this->render('update', [
          'model' => $model, 'allServicios'=>$servicioModel,'direccionesModel'=>$direccionesModel,'trabajadorModel'=>$trabajadorModel
          ]);
    }

    /**
     * Deletes an existing Plane model.
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
     * Finds the Plane model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Plane the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Plane::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
