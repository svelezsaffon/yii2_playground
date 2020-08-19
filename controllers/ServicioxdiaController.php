<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use app\models\Servicioxdia;
use app\models\ServicioxdiaSearch;
use app\models\Servicios;
use app\models\Horarios;
use app\models\Direccion;
use app\models\Trabajador;
use app\models\Notificaciones;
use app\models\Costos;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Servicioxtrabajador;
use app\models\Pago;
use app\models\Cuentaverificada;
use app\models\Horarioxservicio;
use app\models\UserInfo;
use yii\helpers\Url;
use yii\helpers\Html;
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
        'only'=>['create','update','index','delete','view','selecttra','createdir','getempleados'],
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

            $query='SELECT servicioxdia.id as servicio_num,trabajador.id as trabajador_num, user_info.id as user_num,user_info.nombre as usuario_nombre,user_info.apellidos as usuario_apellido,trabajador.nombre,fecha_inicia  FROM servicioxdia,user_info,trabajador WHERE servicioxdia.user=user_info.user AND servicioxdia.trabajador=trabajador.id';


            $searchModel = new ServicioxdiaSearch();
            $provider = new SqlDataProvider(['sql' => $query,]);
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' =>  $provider,                
                ]);

        }else{


            $userinfo= UserInfo::find()->where(['user'=>Yii::$app->user->id])->one();
            $cuentaver= Cuentaverificada::find()->where(['user'=>Yii::$app->user->id])->one(); 
            $servername=Url::to(['cuentaverificada/verify', 'hash' => $cuentaver->hash]);
            
            $verificar=false;
            if($userinfo==NULL){
                $verificar=false;
            }else{
                $verificar=$cuentaver->verificada==0 ? false:true;
            }

            $query='SELECT DISTINCT id,tiempo ,fecha,servicio,direccion,icon,verificado,usuario,idpago FROM (SELECT servicioxdia.id as id,servicioxdia.tiempo as tiempo,servicioxdia.user as usuario,servicioxdia.fecha_inicia as fecha, servicios.nombre as servicio,direccion.direccion as direccion,servicios.icon as icon, pago.id as idpago FROM servicioxdia,direccion,trabajador,servicios,pago WHERE servicioxdia.direccion=direccion.id AND servicioxdia.trabajador=trabajador.id AND servicioxdia.servicio=servicios.id AND servicioxdia.user = '.Yii::$app->user->id.' AND pago.servicioxdia=servicioxdia.id ) as valores LEFT JOIN (select servicioxdia.user as pagouser, pago.id as pagoid,pago.verificado as verificado,servicioxdia as pagoservid  from servicioxdia left join pago on servicioxdia.id=pago.servicioxdia) AS pagos ON valores.id=pagos.pagoservid WHERE fecha > cast((now()) as date)';

            $servicios = Yii::$app->db->createCommand($query)->queryAll();

            return $this->render('index', [                
                'servicios' => $servicios,
                'cuentaver'=>$verificar,
                'linkcuenta'=>$servername
                ]);

        }
    }

    public function actionSelleraccept($id,$action)
    {
       $model = $this->findModel($id);

       if($model!=null){
        if($action==1){
            $model->seller_accepted=1;
            $model->save();

            $noti = new Notificaciones();
            $noti->de=Yii::$app->user->id;
            $noti->para=$model->user;
            $noti->titulo="Trabajo acceptado";
            $noti->texto="El trabajo ha sido acceptado por el proveedor de servicios, pronto se comunicaran contigo";
            $noti->link=Url::to(['servicioxdia/view', 'id' => $model->id]);
            $noti->save();

            Yii::$app->mailer->compose('layouts/trabajo_aceptado')
                ->setFrom('notificaciones@servicio247.co')
                ->setTo(Yii::$app->user->identity->email)
                ->setSubject($noti->titulo)
                ->send();

        }else if($action==0){
            $model->seller_accepted=0;
            $model->save();

            $noti = new Notificaciones();
            $noti->de=Yii::$app->user->id;
            $noti->para=$model->user;
            $noti->titulo="Trabajo rechazado";
            $noti->texto="El trabajo ha sido rechzado por el proveedor de servicios, pronto se comunicaran contigo";
            $noti->link=Url::to(['servicioxdia/view', 'id' => $model->id]);
            $noti->save();

            Yii::$app->mailer->compose('layouts/trabajo_rechazado')
                ->setFrom('notificaciones@servicio247.co')
                ->setTo(Yii::$app->user->identity->email)
                ->setSubject($noti->titulo)
                ->send();


        }
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
        $pago= Pago::find()->where(['servicioxdia' => $model->id])->one();

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
            'pago'=>$pago->id,
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
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $asing=new Servicioxtrabajador();
            $asing->trabajador=intval($model->trabajador);
            $asing->servicio=intval($model->id);
            $asing->tipo='s';
            $asing->save();

            $direccion=Direccion::find()->where(['id'=>$model->direccion])->one();

            $costo=Costos::find()->where(['servicio' => $model->servicio,'horario'=>$model->tiempo, 'ciudad'=>$direccion->ciudad,'trabajador'=>$asing->trabajador])->one();

            $pago = new Pago();
            $pago->servicioxdia=$model->id;
            $pago->user=Yii::$app->user->id;  
            $pago->monto=$costo->valor;
            $pago->plandia=$model->fecha_inicia;            
            $pago->fecha_pago=date("Y-m-d");
            $pago->save(); 

            $noti = new Notificaciones();
            $noti->de=Yii::$app->user->id;
            $noti->para=$model->trabajador;
            $noti->titulo="Trabajo Solicitado";
            $noti->texto="Buenas noticias!! Un usuario ha solicitado un trabajo que tu prestas!!";
            $noti->link=Url::to(['/']);
            $noti->save();

            return $this->redirect(['view', 'id' => $model->id]);

        }
        if(Yii::$app->user->can('user')){

            $servicioModel = Servicios::find()->all();
            $query = new yii\db\Query;
            $query->select(['id'=>'direccion.id','quien_recibe'=>'direccion.quien_recibe','direccion'=>'direccion.direccion','nombre'=>'direccion.nombre',
                    'quien_recibe'=>'direccion.quien_recibe','ciudad'=>'ciudades.nombre','puntos_referencia'=>'direccion.puntos_referencia'])
                ->from(['direccion','ciudades'])
                ->andWhere('direccion.user=:iduser', [':iduser' => Yii::$app->user->id])
                ->andWhere('ciudades.id = direccion.ciudad');
                 
        $command = $query->createCommand();
        $direccionesModel=$command->queryAll();

            $trabajadorModel = Trabajador::find()->all();
            $userinfo= UserInfo::find()->where(['user'=>Yii::$app->user->id])->one();
        
            $query="SELECT servicio, min(valor) as value FROM costos group by servicio";

            $costos = Yii::$app->db->createCommand($query)->queryAll();

            return $this->render('create', [
                'costos'=> $costos,
                'model' => $model, 'allServicios'=>$servicioModel,'userinfo'=>$userinfo,'direccionesModel'=>$direccionesModel,'trabajadorModel'=>$trabajadorModel,'step'=>isset($_GET["step"])?$_GET["step"]:1,
            ]);

        } 


    }



    /**
     * Creates a new Servicioxdia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatedir($step,$serv)
    {
        $model = new Servicioxdia();
        $model->user=Yii::$app->user->id;         
        $model->servicio=intval($serv);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $asing=new Servicioxtrabajador();
            $asing->trabajador=intval($model->trabajador);
            $asing->servicio=intval($model->id);
            $asing->tipo='s';
            $asing->save();

            
            $direccion=Direccion::find()->where(['id'=>$model->direccion])->one();

            $costo=Costos::find()->where(['servicio' => $model->servicio,'horario'=>$model->tiempo, 'ciudad'=>$direccion->ciudad])->one();

            $pago = new Pago();
            $pago->servicioxdia=$model->id;
            $pago->user=Yii::$app->user->id;  
            $pago->monto=$costo->valor;
            $pago->plandia=$model->fecha_inicia;            
            $pago->fecha_pago=date("Y-m-d");
            $pago->save(); 
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $servicioModel = Servicios::find()->all();
        $direccionesModel = Direccion::find()->where(['user' => $model->user])->all();
        $trabajadorModel = Trabajador::find()->all();
        $userinfo= UserInfo::find()->where(['user'=>Yii::$app->user->id])->one();

        $searchModel = new Horarioxservicio();

        $horarioz = (new \yii\db\Query())
                ->select(['horarios.id as id', 'horarios.descripcion as descri'])
                ->from(['costos'])
                ->join('LEFT JOIN', 'horarios', 'costos.horario = horarios.id')
                ->andWhere('costos.servicio = :serv',[':serv' => $serv])
                ->distinct()
                ->all();

        foreach ($horarioz as $horario) {
            
            $horarioss[$horario['id']]=$horario['descri'];
        }  


        $query="SELECT servicio, min(valor) as value FROM costos group by servicio";

        $costos = Yii::$app->db->createCommand($query)->queryAll();
        

        return $this->render('create', [
            'costos'=> $costos,
            'model' => $model, 'allServicios'=>$servicioModel,'userinfo'=>$userinfo,'direccionesModel'=>$direccionesModel,'trabajadorModel'=>$trabajadorModel,'step'=>$step,'horarios'=>$horarioss,
            ]);
    } 

    public function actionGetempleados($servicio,$dir,$fecha){


        $query="SELECT DISTINCT trabajador.id as idt,trabajador.nombre as nombre,trabajador.anosexperiencia as anos,trabajador.serviciosprestados as numser, trabajador.cedula as cedula,trabajador.telefono as telefono,trabajador.apellido as apellido  FROM trabajador,trabajadordesem WHERE trabajador.id IN (select costos.trabajador from costos WHERE costos.servicio=".$servicio." AND costos.ciudad IN (select direccion.ciudad from direccion WHERE direccion.id=".$dir.")) AND trabajador. id NOT IN (SELECT servicioxdia.trabajador FROM servicioxdia,pago WHERE servicioxdia.id=pago.servicioxdia and verificado=1) AND trabajador.id=trabajadordesem.trabajador";

            $trabajadorModel = Yii::$app->db->createCommand($query)->queryAll();

        $index=0;

        foreach ($trabajadorModel as $trabajador) {
            echo '
  <div class="row">
    <div class="col-md-4">
      
        <div class="panel panel-primary">
          <div class="panel-body text-center">        
            <span class="fa-stack fa-4x" >        
              <i class="fa fa-circle fa-stack-2x text-primary yeti"></i>        
              <i class="fa fa-smile-beam fa-stack-1x fa-inverse"></i>        
            </span>
            <h4 class="service-heading yeti"> '.$trabajador['nombre'].' '.$trabajador['apellido'].'</h4>          
            <h6 class="service-heading yeti"> lleva con nostros '.$trabajador['anos'].' años </h6>          
            <h6 class="service-heading yeti"> Ha completado '.$trabajador['numser'].' servicios exitosamente</h6>  
            '.Html::radio("Servicioxdia[trabajador]", false,['value' => $trabajador['idt'],'onclick'=>"myFunction4(".$trabajador['idt'].")",'label' => 'Seleccionar',]).'        
          </div>
        </div>      
    </div>
  </div>

            ';
            $index++;
        }

        if($index==0){
            echo '<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  Disculpanos! el servicio que escogiste no se presta en la ciudad de tu direccion! Nuestro equipo ya esta al tanto del error y se pondra en contacto contigo!
</div>';
        }  

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
         $userinfo= UserInfo::find()->where(['user'=>Yii::$app->user->id])->one();

        return $this->render('update', [
            'model' => $model, 'allServicios'=>$servicioModel,'userinfo'=>$userinfo,'direccionesModel'=>$direccionesModel,'trabajadorModel'=>$trabajadorModel,'step'=>isset($_GET["step"])?$_GET["step"]:1,
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
