<?php

namespace app\controllers;

use Yii;
use app\models\Pago;
use app\models\PagoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException; 
use yii\filters\VerbFilter;
use app\models\Servicioxdia;
use app\models\ConveniosPago;
use yii\filters\AccessControl;

/**
 * PagoController implements the CRUD actions for Pago model.
 */
class PagoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>AccessControl::className(),
                'only'=>['create','createmodal','update','index','delete','view'],
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
     * Lists all Pago models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        if(Yii::$app->user->can('admin')){
            $searchModel = new PagoSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);        

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,                
            ]);            

        }else{

            $query='SELECT pago.id as pagoid,servicioxdia.id as servicioid, servicios.nombre, icon, servicioxdia.fecha_inicia as fecha FROM pago,servicioxdia,servicios WHERE pago.verificado is null AND pago.user='.Yii::$app->user->id.' AND pago.servicioxdia = servicioxdia.id AND servicioxdia.servicio=servicios.id order by pago.plandia';

            $pagos = Yii::$app->db->createCommand($query)->queryAll();

            return $this->render('index', [
                    'pagos'=> $pagos,
            ]);            


        }




    }

    /**
     * Displays a single Pago model.
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
     * Creates a new Pago model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     *
    public function actionCreate()
    {
        $model = new Pago();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    */

    /**
     * Creates a new Pago model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreates($id)
    {
        $model = new Pago();
        
        $serv= Servicioxdia::find()->where(['id' => $id])->one();

        $model->user=Yii::$app->user->id;    

        $model->fecha_pago=date("Y-m-d");
        
        $model->servicioxdia=$id; 
        
        $model->plandia= $serv->fecha_inicia;
        
        $model->verificado=0;

        $metodos =ConveniosPago::find()->all();

        if ($model->load(Yii::$app->request->post())) {

            $util =ConveniosPago::find()->where(['id' => $model->metodo])->one();

            $model->monto=$util->valor;

            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);    
            }
            
        }

        return $this->render('create', [
            'model' => $model,'metodos'=>$metodos,
        ]);
    }    


    /*


    */


        /**
     * Creates a new Pago model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatep($id,$dia)
    {
        $model = new Pago();
        $model->user=Yii::$app->user->id;   
        $model->fecha_pago=date("Y-m-d");
        $model->plan=$id;
        $model->plandia=$dia;
        $model->verificado=0;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }     

    /**
     * Updates an existing Pago model.
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

        $metodos =ConveniosPago::find()->all();
        return $this->render('update', [
            'model' => $model,'metodos'=>$metodos,
        ]);
    }
    

    /**
     * Deletes an existing Pago model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     *
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    */

    /**
     * Finds the Pago model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pago the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pago::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
