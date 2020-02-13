<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Servicio por dias';
$this->params['breadcrumbs'][] = $this->title;

if(Yii::$app->user->can('admin')){
	echo Yii::$app->controller->renderPartial('index_admin', ['searchModel' => $searchModel,'dataProvider' => $dataProvider]);
}else if(Yii::$app->user->can('user')){
	echo Yii::$app->controller->renderPartial('index_guest',['servicios'=>$servicios,'cuentaver'=>$cuentaver,
                'linkcuenta'=>$linkcuenta]);
}else if(Yii::$app->user->can('seller')){
echo Yii::$app->controller->renderPartial('index_seller',['servicios'=>$servicios,'cuentaver'=>$cuentaver,
                'linkcuenta'=>$linkcuenta]);
}

?>
