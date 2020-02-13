<?php

namespace app\controllers;

use Yii;
use app\models\Plane;
use app\models\Pago;
use app\models\Servicios;
use app\models\Direccion;
use app\models\Trabajador;
use app\models\PlaneSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Servicioxtrabajador;
use app\models\UserInfo; 
use app\models\Cuentaverificada;
use yii\helpers\Url;
use app\models\Costos;
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
        'only'=>['create','update','index','delete','view','getempleados'],
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
            
            $userinfo= UserInfo::find()->where(['user'=>Yii::$app->user->id])->one();
            $cuentaver= Cuentaverificada::find()->where(['user'=>Yii::$app->user->id])->one(); 
            $servername=Url::to(['cuentaverificada/verify', 'hash' => $cuentaver->hash]);   

            $verificar=false;
            if($userinfo==NULL){
                $verificar=false;
            }else{
                $verificar=$cuentaver->verificada==0 ? false:true;
            }

            $dir = Yii::$app->db->createCommand('SELECT plane.id, direccion.direccion as dir, direccion.nombre as dir_nombre, plane.fecha_inicia as fecha,plane.timepo as tiempo ,servicios.image as img, servicios.nombre as nombre,servicios.icon as icon FROM plane, servicios,direccion WHERE plane.user = '.Yii::$app->user->id.' and servicio= servicios.id and plane.direccion=direccion.id')->queryAll();

            return $this->render('index', [
                'planes'=>$dir,
                'cuentaver'=>$verificar,                
                'linkcuenta'=>$servername                
                ]);

        }
    }

    public function Generarpagos($plan){

        echo date('w', strtotime("2019-02-03"));

        $model=$this->findModel($plan); 

        $fecha=null;
            $days=[
                1=>$model->lunes,
                2=>$model->martes,
                3=>$model->miercoles,
                4=>$model->jueves,
                5=>$model->viernes,
                6=>$model->sabado,
                0=>$model->domingo
            ];

        if($model->fecha_inicia > date("Y-m-d")){
            $fecha =$model->fecha_inicia;

        }else{

            $out=false;

            $fecha=date("Y-m-d");            
            
            while($out==false){

                $weekday= date('w', strtotime($fecha));

                if($days[$weekday]==1){
                    $out=true;

                }else{
                    $fecha = date('Y-m-d', strtotime($fecha . ' +1 day'));        
                }                
            }

        }

        $create=35;

        $direccion=Direccion::find()->where(['id'=>$model->direccion])->one();

        $costo=Costos::find()->where(['servicio' => $model->servicio,'horario'=>$model->timepo, 'ciudad'=>$direccion->ciudad])->one();

        while ($create > 0) {
            
            $weekday= date('w', strtotime($fecha));

            if($days[$weekday]==1){
                $pago = new Pago();
                    $pago->plan=$model->id;
                    $pago->user=Yii::$app->user->id;  
                    $pago->monto=$costo->valor;
                    $pago->plandia=$fecha;
                    $pago->fecha_pago=date("Y-m-d");
                $pago->save();             
                $create--;    
            }

            $fecha = date('Y-m-d', strtotime($fecha . ' +1 day'));        
            
        }

        


    }


    public function actionGetempleados($servicio,$fecha){
        $query="SELECT trabajador.nombre as nombre, trabajador.cedula as cedula,trabajador.telefono as telefono,trabajador.apellido as apellido, trabajador.id as idt FROM trabajador,trabajadordesem WHERE trabajador.id NOT IN(SELECT servicioxdia.trabajador FROM servicioxdia,pago WHERE servicioxdia.id=pago.servicioxdia and verificado=1 AND servicioxdia.fecha_inicia='".$fecha."') AND trabajador.id=trabajadordesem.trabajador AND trabajadordesem.servicio=".$servicio;

            $trabajadorModel = Yii::$app->db->createCommand($query)->queryAll();

        $index=0;
        foreach ($trabajadorModel as $trabajador) {
            echo '          <div class="row">
                <div class="col">
            <div class="panel panel-default">               
                <div class="panel-heading">
                    Empledo estrella #'.$index.'
                </div>              
                <div class="panel-body">        
                    <div class="container">
                        <div class="row">           
                            <div class="col col-lg-10">                                
                                '.$trabajador['nombre'].' '.$trabajador['apellido'].'
                            </div>
                            <div class="col col-lg-2">      
                  <span class="badge">
                                '.\yii\bootstrap\Html::radio("Plane[trabajador]", false,['value' => $trabajador['idt'],'onclick'=>"myFunction4()",'label' => 'Seleccionar',]).'
                               </span>
              </div>
                        </div>
                    </div>
                </div>
            </div>   
            </div>
        </div>  ';
            $index++;
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
        $pago= Pago::find()->where(['plan' => $model->id,'user' => Yii::$app->user->id ])->andWhere(['>', 'plandia', date("Y-m-d")])->one();

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
            'pago_id'=>$pago->id, 
            'pago_monto'=>$pago->monto,
            'pago_fecha'=>$pago->plandia,
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
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $asing=new Servicioxtrabajador();
            $asing->trabajador=intval($model->trabajador);
            $asing->servicio=intval($model->id);
            $asing->tipo='p';
            $asing->save();

            $this->Generarpagos($model->id);

            return $this->redirect(['view', 'id' => $model->id]);
        }


        $servicioModel = Servicios::find()->all();
        $direccionesModel = Direccion::find()->where(['user' => $model->user])->all();
        $trabajadorModel = Trabajador::find()->all();
        $userinfo= UserInfo::find()->where(['user'=>Yii::$app->user->id])->one();

        return $this->render('create', [
            'model' => $model, 'allServicios'=>$servicioModel,'userinfo'=>$userinfo,'direccionesModel'=>$direccionesModel,'trabajadorModel'=>$trabajadorModel
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
