<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Planes';
$this->params['breadcrumbs'][] = $this->title;

if(Yii::$app->user->can('admin')){
    echo Yii::$app->controller->renderPartial('index_admin', ['searchModel' => $searchModel,'dataProvider' => $dataProvider]);
}else{
    echo Yii::$app->controller->renderPartial('index_guest',['planes'=>$planes]);
}

?>
