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
        $searchModel = new ServicioxdiaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Servicioxdia model.
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
     * Creates a new Servicioxdia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Servicioxdia();
        $model->user=Yii::$app->user->id; 
        
        if(isset($_GET["serv"]) ){
            $model->servicio=intval($_GET["serv"]-1);
            $step=$_GET["step"];
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $servicioModel = Servicios::find()->all();
        $direccionesModel = Direccion::find()->where(['user' => $model->user])->all();
        $trabajadorModel = Trabajador::find()->all();

        return $this->render('create', [
            'model' => $model, 'allServicios'=>$servicioModel,'direccionesModel'=>$direccionesModel,'trabajadorModel'=>$trabajadorModel,'step'=>isset($_GET["step"])?$_GET["step"]:1,
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
