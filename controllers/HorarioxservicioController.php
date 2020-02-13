<?php

namespace app\controllers;

use Yii;
use yii\data\SqlDataProvider;
use app\models\Horarioxservicio;
use app\models\HorarioxserviciosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Servicios;
use app\models\Horarios;
use app\models\Costos;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

/**
 * HorarioxservicioController implements the CRUD actions for Horarioxservicio model.
 */
class HorarioxservicioController extends Controller
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
     * Lists all Horarioxservicio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HorarioxserviciosSearch();
        
        $query='SELECT nombre,horarios.descripcion as descripcion FROM horarioxservicio,servicios,horarios WHERE horarioxservicio.id_horario=horarios.id AND horarioxservicio.id_servicio=servicios.id';
        $provider = new SqlDataProvider(['sql' => $query,]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $provider,
        ]);
    }



    public function actionList($idtrabajo){        

            $horarios = (new \yii\db\Query())
                ->select(['horarios.id as id', 'horarios.descripcion as descri'])
                ->from(['costos'])
                ->join('LEFT JOIN', 'horarios', 'costos.horario = horarios.id')
                ->andWhere('costos.servicio = :serv',[':serv' => $idtrabajo])
                ->distinct()
                ->all();

        foreach ($horarios as $horario) {
            echo "<option value='".$horario['id']."'>".$horario['descri']."</option>";
        }  


    }


    /**
     * Displays a single Horarioxservicio model.
     * @param integer $id_horario
     * @param integer $id_servicio
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_horario, $id_servicio)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_horario, $id_servicio),
        ]);
    }

    /**
     * Creates a new Horarioxservicio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Horarioxservicio();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_horario' => $model->id_horario, 'id_servicio' => $model->id_servicio]);
        }

         
         $servicios = ArrayHelper::map(Servicios::find()->all(), 'id', 'nombre');

         $horarios= ArrayHelper::map(Horarios::find()->all(), 'id', 'descripcion');

        return $this->render('create', [
            'model' => $model,'horarios'=>$horarios,'servicios'=>$servicios
        ]);
    }

    /**
     * Updates an existing Horarioxservicio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_horario
     * @param integer $id_servicio
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_horario, $id_servicio)
    {
        $model = $this->findModel($id_horario, $id_servicio);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_horario' => $model->id_horario, 'id_servicio' => $model->id_servicio]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Horarioxservicio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_horario
     * @param integer $id_servicio
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_horario, $id_servicio)
    {
        $this->findModel($id_horario, $id_servicio)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Horarioxservicio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_horario
     * @param integer $id_servicio
     * @return Horarioxservicio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_horario, $id_servicio)
    {
        if (($model = Horarioxservicio::findOne(['id_horario' => $id_horario, 'id_servicio' => $id_servicio])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
