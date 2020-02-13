<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use lo\widgets\modal\ModalAjax;


?>

<script type="text/javascript">
  function stop_loading(){
    SimpleLoading.stop();
  }
</script>

<?php 


if($upuser==false && $cuentaver==true){
?>
<section id="choose">
<div class="row">
  <div class="jumbotron text-cnter">                    
    <h2 class="section-heading">
      ¡Hola, <?=Html::encode($userinfo->nombre)?>!
    </h2>  
    <p class="grey-text">
      <strong> ¿Que servicio necesitas hoy?</strong>
    </p>
  </div>
</div>

  
  <div class="row">

    <?php 
    $counter=1;

    foreach ($allServicios as $servicio) { ?>  

      <?php if ($counter %4 ==0){
          echo "</div>";
          echo '<div class="row">';
      }
      ?>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="media">
                                <div class="media-body">
                                    
                                    <?php
                                      echo '<img src="img/servicios/'.$servicio->image.'" class="img-responsive center-block">';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="grey-text section-subheading">
                                    
                                <p class="border-top-xx-small small-text"></p>
                                <p class="border-top-xx-small "><?php echo $servicio->nombre?></p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                          <?= Html::a('Seleccionar', ['/servicioxdia/createdir','step'=>"2",'serv'=>intval($servicio->id)], ['class'=>'btn btn-primary']) ?>
                        </div>
                    </div>                
                </div>
            </div>
        </div>  

        <?php 
        $counter++;
        ?>    

    <?php } ?>    

  </div>

</section>



<?php
}else {

  echo '<script type="text/javascript"> stop_loading(); </script>';

?>

<div class="alert alert-danger text-center" role="alert">
  
  <div class="row">
    <h1>Necesitamos que confirmes tu cuenta</h1>
  </div>
  
  <div class="row text-center">
      Puedes verificar tu cuenta de dos formas:
      <ol>
        <li>¿Despues? Boton amarillo... Puedes hacerlo con el email que te hemos enviado, el link estara almacenado en tu correo electronico</li>
        <li>¿Ya? Boton azul...seras redireccionado a una pagian para llenar los datos</li>        
      </ol>
  </div>

<br>
  <div class="row text-center">
    
    <div class="row">
      <div class="col-sm-6">
        <button type="button" class="btn btn-primary" onclick="enviarEmail(<?=Yii::$app->user->id?>)" aria-label="Left Align">
          <span class="glyphicon glyphicon-envelope" aria-hidden="true"> Reenviar email</span>
        </button>
      </div>
      <a class="btn btn-info" href=<?php echo $linkcuenta; ?> role="button"><i class="fas fa-check-double" aria-hidden="true"> Verificar Ahora</i></a>
    </div>


  </div>


</div> 

<?php 
}
?>

