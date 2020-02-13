<?php

if(Yii::$app->user->isGuest){

    echo Yii::$app->controller->renderPartial('not_login_index', ['allServicios'=>$allServicios,'model'=>$model,'login_model'=>$login_model]);

}else if(Yii::$app->user->can('user')){

    echo Yii::$app->controller->renderPartial('index_body_login_user',['userinfo'=>$userinfo,'upuser'=>$upuser,'allServicios'=>$allServicios,'cuentaver'=>$cuentaver,'linkcuenta'=>$linkcuenta]);


}else if(Yii::$app->user->can('seller')){

    echo Yii::$app->controller->renderPartial('index_body_login_seller',['userinfo'=>$userinfo,'upuser'=>$upuser,'allServicios'=>$allServicios,'cuentaver'=>$cuentaver,'servicios_prestar'=>$servicios_prestar,'linkcuenta'=>$linkcuenta]);

}
?>
