<?php

if(Yii::$app->user->isGuest){

    echo Yii::$app->controller->renderPartial('not_login_index', ['allServicios'=>$allServicios]);

}else{

    echo Yii::$app->controller->renderPartial('index_login',['userinfo'=>$userinfo,'upuser'=>$upuser,'allServicios'=>$allServicios]);
}
?>
