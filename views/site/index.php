<?php

if(Yii::$app->user->isGuest){

    echo Yii::$app->controller->renderPartial('not_login_index', ['allServicios'=>$allServicios,'model'=>$model,'login_model'=>$login_model]);

}else{

    echo Yii::$app->controller->renderPartial('index_body_login',['userinfo'=>$userinfo,'upuser'=>$upuser,'allServicios'=>$allServicios]);
}
?>
