<?php

namespace app\controllers;

use Yii;
use app\models\Servicioxdia;
use app\models\ServicioxdiaSearch;
use app\models\Servicios;
use app\models\Direccion;
use app\models\Trabajador;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Servicioxtrabajador;
use app\models\Pago;

/**
 * ServicioxdiaController implements the CRUD actions for Servicioxdia model.
 */
class ServicioxdiaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        'access'=>[
        'class'=>AccessControl::className(),
        'only'=>['create','update','index','delete','view','selecttra'],
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
     * Lists all Servicioxdia models.
     * @return mixed
     */
    public function actionIndex()
    {

        if(Yii::$app->user->can('admin')){

            $searchModel = new ServicioxdiaSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,                
                ]);

        }else{

            $query='SELECT DISTINCT id,tiempo ,fecha,servicio,direccion,icon,verificado,usuario FROM (SELECT servicioxdia.id as id,servicioxdia.tiempo as tiempo,servicioxdia.user as usuario,servicioxdia.fecha_inicia as fecha, servicios.nombre as servicio,direccion.direccion as direccion,servicios.icon as icon FROM servicioxdia,direccion,trabajador,servicios WHERE servicioxdia.direccion=direccion.id AND servicioxdia.trabajador=trabajador.id AND servicioxdia.servicio=servicios.id AND servicioxdia.user = '.Yii::$app->user->id.' ) as valores LEFT JOIN (select servicioxdia.user as pagouser, pago.id as pagoid,pago.verificado as verificado,servicioxdia as pagoservid  from servicioxdia left join pago on servicioxdia.id=pago.servicioxdia) AS pagos ON valores.id=pagos.pagoservid WHERE fecha > cast((now()) as date)';

            $servicios = Yii::$app->db->createCommand($query)->queryAll();

            return $this->render('index', [                
                'servicios' => $servicios,
                ]);

        }
    }

    /**
     * Displays a single Servicioxdia model.
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
            'tiempo'=>$model->tiempo,
            'name'=>'Servicio '.$serv->nombre.' que inicia '.$model->fecha_inicia,            
            'user'=>Yii::$app->user->id,
            'trabajador'=>$trab->nombre.' '.$trab->apellido,
            'servicio'=>$serv->nombre,            
            'fecha_inicia'=>$model->fecha_inicia,            
            'direccion'=>$dir->direccion,
            'desc'=>$serv->descripcion,
            'icon'=>$serv->icon,
            );  


        return $this->render('view', [
            'model' => $obj,
            ]);
    }

    /**
     * Creates a new Servicioxdia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Servicioxdia();
        $model->user=Yii::$app->user->id; 
        $model->trabajador=6;
        
        if(isset($_GET["serv"]) ){
            $model->servicio=intval($_GET["serv"]-1);
            $step=$_GET["step"];
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['selecttra', 'id' => $model->id]);
        }

        $servicioModel = Servicios::find()->all();
        $direccionesModel = Direccion::find()->where(['user' => $model->user])->all();
        $trabajadorModel = Trabajador::find()->all();

        return $this->render('create', [
            'model' => $model, 'allServicios'=>$servicioModel,'direccionesModel'=>$direccionesModel,'trabajadorModel'=>$trabajadorModel,'step'=>isset($_GET["step"])?$_GET["step"]:1,
            ]);
    }

    public function actionSelecttra($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $asing=new Servicioxtrabajador();
            $asing->trabajador=intval($model->trabajador);
            $asing->servicio=intval($model->id);
            $asing->tipo='s';
            $asing->save();

            $pago = new Pago();
            $pago->servicioxdia=$model->id;
            $pago->user=Yii::$app->user->id;  
            $pago->plandia=$model->fecha_inicia;
            $pago->monto=0;
            $pago->metodo=3;
            $pago->fecha_pago=date("Y-m-d");
            $pago->save();


            return $this->redirect(['view', 'id' => $model->id]);
        }
        
        $model->trabajador=NULL;
        
        $query="SELECT trabajador.nombre as nombre, trabajador.cedula as cedula,trabajador.telefono as telefono,trabajador.apellido as apellido, trabajador.id as id FROM trabajador,trabajadordesem WHERE trabajador.id NOT IN(SELECT servicioxdia.trabajador FROM servicioxdia,pago WHERE servicioxdia.id=pago.servicioxdia and verificado=1 AND servicioxdia.fecha_inicia='".$model->fecha_inicia."') AND trabajador.id=trabajadordesem.trabajador AND trabajadordesem.servicio=".$model->servicio;

            $trabajadorModel = Yii::$app->db->createCommand($query)->queryAll();

        return $this->render('uptra', [
            'model' => $model,'trabajadorModel'=>$trabajadorModel,
            ]);
    }


    /**
     * Updates an existing Servicioxdia model.
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
        $direccionesModel = Direccion::find()->where(['user' => $model->user])->all();
        $trabajadorModel = Trabajador::find()->all();

        return $this->render('update', [
            'model' => $model, 'allServicios'=>$servicioModel,'direccionesModel'=>$direccionesModel,'trabajadorModel'=>$trabajadorModel,'step'=>isset($_GET["step"])?$_GET["step"]:1,
            ]);
    }

    /**
     * Deletes an existing Servicioxdia model.
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
     * Finds the Servicioxdia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Servicioxdia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Servicioxdia::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
