
<!-- Main jumbotron for a primary marketing message or call to action -->

<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use lo\widgets\modal\ModalAjax;


/* @var $this yii\web\View */
/* @var $model app\models\UserInfo */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container">

  <div class="jumbotron">
    <div class="container">
        <?php 
        if($upuser == false){
        ?>
        <h1>Hola, <?=$userinfo->nombre?> <?=$userinfo->apellidos?>!</h1>
          <?=Yii::$app->controller->renderPartial('index_body_login',['allServicios'=>$allServicios]);?>
        <?php }else{?>

         <div class="alert alert-danger" role="alert">
          <div class="row">
            <h1>Necesitamos que completes la informacion de tu perfil</h1>
          </div>
          <div class="row">
            <?php            

              echo ModalAjax::widget([
              'id' => 'Actualizar_mi_perfil',
              
              'toggleButton' => [
                'label' => 'Actualizar mi perfil',
                'class' => 'btn btn-danger'
              ],
                  'url' => Url::to(['/user-info/create']),
                  'ajaxSubmit' => true,
                  'autoClose' => true,
    
              ]); 

            ?>
          </div>

         </div> 
        
        <?php }?>


      
    </div>
  </div>

</div>