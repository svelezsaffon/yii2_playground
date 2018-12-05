<?php

namespace app\controllers;

use Yii;
use app\models\Servicioxtrabajador;
use app\models\ServicioxtrabajadorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ServicioxtrabajadorController implements the CRUD actions for Servicioxtrabajador model.
 */
class ServicioxtrabajadorController extends Controller
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
     * Lists all Servicioxtrabajador models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServicioxtrabajadorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Servicioxtrabajador model.
     * @param integer $servicio
     * @param integer $trabajador
     * @param string $tipo
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($servicio, $trabajador, $tipo)
    {
        return $this->render('view', [
            'model' => $this->findModel($servicio, $trabajador, $tipo),
        ]);
    }

    /**
     * Creates a new Servicioxtrabajador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Servicioxtrabajador();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'servicio' => $model->servicio, 'trabajador' => $model->trabajador, 'tipo' => $model->tipo]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Servicioxtrabajador model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $servicio
     * @param integer $trabajador
     * @param string $tipo
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($servicio, $trabajador, $tipo)
    {
        $model = $this->findModel($servicio, $trabajador, $tipo);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'servicio' => $model->servicio, 'trabajador' => $model->trabajador, 'tipo' => $model->tipo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Servicioxtrabajador model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $servicio
     * @param integer $trabajador
     * @param string $tipo
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($servicio, $trabajador, $tipo)
    {
        $this->findModel($servicio, $trabajador, $tipo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Servicioxtrabajador model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $servicio
     * @param integer $trabajador
     * @param string $tipo
     * @return Servicioxtrabajador the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($servicio, $trabajador, $tipo)
    {
        if (($model = Servicioxtrabajador::findOne(['servicio' => $servicio, 'trabajador' => $trabajador, 'tipo' => $tipo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
