<?php

/* @var $this yii\web\View */

$this->title = 'Buscando trabajo';

if(Yii::$app->user->isGuest){
    echo Yii::$app->controller->renderPartial('diagram', ['allServicios'=>$allServicios]);
}else{
    echo Yii::$app->controller->renderPartial('index_login',['userinfo'=>$userinfo,'upuser'=>$upuser]);
}
?>
