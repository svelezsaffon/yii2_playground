<?php

namespace app\controllers;

use Yii;
use app\models\Trabajador;
use app\models\TrabajadorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * TrabajadorController implements the CRUD actions for Trabajador model.
 */
class TrabajadorController extends Controller
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


    public function actionAnalyze($id){
        return "svs";
    }

    /**
     * Lists all Trabajador models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('create-trabajador')){
            $searchModel = new TrabajadorSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                ]);

        }else{
            
            return $this->redirect(['/']);

        }
    }

    /**
     * Displays a single Trabajador model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('create-trabajador')){
            return $this->render('view', [
                'model' => $this->findModel($id),
                ]);
        }else{
            
            return $this->redirect(['/']);

        }
    }

    /**
     * Creates a new Trabajador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        if(Yii::$app->user->can('create-trabajador')){
            $model = new Trabajador();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('create', [
                'model' => $model,
                ]);
        }else{
            
            return $this->redirect(['/']);

        }
    }

    /**
     * Updates an existing Trabajador model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('create-trabajador')){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
                ]);
        }else{
            
            return $this->redirect(['/']);

        }
    }

    /**
     * Deletes an existing Trabajador model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('create-trabajador')){
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }else{
            
            return $this->redirect(['/']);

        }
    }

    /**
     * Finds the Trabajador model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Trabajador the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if(Yii::$app->user->can('create-trabajador')){
            if (($model = Trabajador::findOne($id)) !== null) {
                return $model;
            }

            throw new NotFoundHttpException('The requested page does not exist.');
        }else{
            
            return $this->redirect(['/']);

        }
    }
}
