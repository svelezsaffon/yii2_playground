<?php

namespace app\controllers;

use Yii;
use app\models\Ranking;
use app\models\RankingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * RankingController implements the CRUD actions for Ranking model.
 */
class RankingController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
        'access'=>[
        'class'=>AccessControl::className(),
        'only'=>['create','creates','update','index','delete','view'],
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
     * Lists all Ranking models.
     * @return mixed
     */
    public function actionIndex()
    {

        $query='SELECT servicios.nombre AS nombre, servicios.icon AS icon, servicioxdia.id AS idservicio, servicioxdia.trabajador AS trabajador FROM servicioxdia,pago,servicios WHERE servicioxdia.id=pago.servicioxdia AND servicios.id=servicioxdia.servicio AND servicioxdia.id NOT IN (SELECT idservicio FROM ranking) AND pago.verificado AND servicioxdia.fecha_inicia < cast((now()) as date) AND servicioxdia.user ='.Yii::$app->user->id; 

        $ranking = Yii::$app->db->createCommand($query)->queryAll();

        return $this->render('index', [
            'rankings'=>$ranking,
        ]);
    }

    /**
     * Displays a single Ranking model.
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


    public function actionCreates($ids,$idt){
        
        $model = new Ranking();


        $model->idservicio=$ids;

        $model->idtrabajador=$idt;   


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->goHome();
        }
  


        return $this->renderAjax('create', [
            'model' => $model,
        ]);        
    }

    /**
     * Creates a new Ranking model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ranking();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Ranking model.
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
     * Deletes an existing Ranking model.
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
     * Finds the Ranking model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ranking the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ranking::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
