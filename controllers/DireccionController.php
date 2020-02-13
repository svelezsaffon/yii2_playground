<?php

namespace app\controllers;

use Yii;
use app\models\Direccion;
use app\models\Ciudades;
use app\models\DireccionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Cuentaverificada;
use app\models\UserInfo;
use yii\helpers\Url;
/**
 * DireccionController implements the CRUD actions for Direccion model.
 */
class DireccionController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Direccion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DireccionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['user'=>Yii::$app->user->id]); 
        $dir= Direccion::find()->where(['user'=>Yii::$app->user->id])->all() ;

               $query = new yii\db\Query;

         $query->select(['id'=>'direccion.id','direccion'=>'direccion.direccion','nombre'=>'direccion.nombre',
                    'quien_recibe'=>'direccion.quien_recibe','ciudad'=>'ciudades.nombre','puntos_referencia'=>'direccion.puntos_referencia'])
                ->from(['direccion','ciudades'])
                ->andWhere('direccion.user=:iduser', [':iduser' => Yii::$app->user->id])
                ->andWhere('ciudades.id = direccion.ciudad');
                 

        $command = $query->createCommand();
        $dir=$command->queryAll();


        $userinfo= UserInfo::find()->where(['user'=>Yii::$app->user->id])->one();
            $cuentaver= Cuentaverificada::find()->where(['user'=>Yii::$app->user->id])->one(); 
            $servername=Url::to(['cuentaverificada/verify', 'hash' => $cuentaver->hash]);   
            $verificar=false;
            if($userinfo==NULL){
                $verificar=false;
            }else{
                $verificar=$cuentaver->verificada==0 ? false:true;
            }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'direcciones' => $dir,
            'cuentaver'=>$verificar,            
            'linkcuenta'=>$servername            
        ]);
    }

    /**
     * Displays a single Direccion model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $query = new yii\db\Query;

         $query->select(['id'=>'direccion.id','direccion'=>'direccion.direccion','nombre'=>'direccion.nombre',
                    'quien_recibe'=>'direccion.quien_recibe','ciudad'=>'ciudades.nombre','puntos_referencia'=>'direccion.puntos_referencia'])
                ->from(['direccion','ciudades'])
                ->where('direccion.id=:idp', [':idp' => $id])
                ->andWhere('direccion.user=:iduser', [':iduser' => Yii::$app->user->id])
                ->andWhere('ciudades.id = direccion.ciudad');
                 

        $command = $query->createCommand();
        $provider=$command->queryOne();

        return $this->render('view', [
            'model' => $provider,
        ]);
    }

    public function actionGetname($id){

        $model=Direccion::find()->where(['id' => $id])->one();

        return $model->direccion;
    }

    /**
     * Creates a new Direccion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Direccion();

        if ($model->load(Yii::$app->request->post()) ) {
            
            $model->user=Yii::$app->user->id;

            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);    
            }
            
        }

        $direcciones= Ciudades::find()->where(['habilitada'=>1])->all();

        return $this->render('create', [
            'model' => $model,
            'direcciones'=>$direcciones
        ]);
    }

    public function actionCreatemodal($loc)
    {
        $model = new Direccion();

        if ($model->load(Yii::$app->request->post()) ) {
            
            $model->user=Yii::$app->user->id;

            if($model->save()){
                if($loc==10){
                    return $this->redirect(['/servicioxdia/create', 'id' => $model->id]);    
                }else{
                    return $this->redirect(['/plane/create', 'id' => $model->id]);    
                }

            }
            
        }

        $direcciones= Ciudades::find()->where(['habilitada'=>1])->all();

        return $this->renderAjax('createmodal', [
            'model' => $model,
            'direcciones'=>$direcciones
        ]);
    }


    /**
     * Updates an existing Direccion model.
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


        $direcciones= Ciudades::find()->where(['habilitada'=>1])->all();

        return $this->render('create', [
            'model' => $model,
            'direcciones'=>$direcciones
        ]);
    }

    /**
     * Deletes an existing Direccion model.
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
     * Finds the Direccion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Direccion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Direccion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
