<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Servicioxdia */

$this->title = 'Configurar servicio';
$this->params['breadcrumbs'][] = ['label' => 'Servicioxdias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicioxdia-create">

    <?php

        if(Yii::$app->user->can('user')){
           
           if(isset($horarios)){
                 echo $this->render('_form', [
                'costos'=> $costos,
               'model' => $model,'allServicios'=>$allServicios,'userinfo'=>$userinfo,'direccionesModel'=>$direccionesModel,'trabajadorModel'=>$trabajadorModel,'step'=>$step,'horarios'=>$horarios
              ]);
           }else{
             echo $this->render('_form', [
                'costos'=> $costos,
               'model' => $model,'allServicios'=>$allServicios,'userinfo'=>$userinfo,'direccionesModel'=>$direccionesModel,'trabajadorModel'=>$trabajadorModel,'step'=>$step
            ]);
           }

        }else if(Yii::$app->user->can('seller')){         
        
           if(isset($horarios)){
                 echo $this->render('_form_seller', [
                    'lista_servicios'=>$lista_servicios,'userinfo'=>$userinfo  
              ]);
           }else{
             echo $this->render('_form_seller', [
                'lista_servicios'=>$lista_servicios,'userinfo'=>$userinfo  
            ]);
           }

        }



     ?>

</div>
