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

<script>
  function cancelarTrabajo(id) {

    SimpleLoading.start('gears');
    
    $.post("index.php?r=servicioxdia/selleraccept&action=0&id="+id,
              function( data ) {                                       
                  SimpleLoading.stop();  
              }
          ); 
  }


  function acetptarTrabajo(id){
    
    SimpleLoading.start('gears');
    $.get("index.php?r=servicioxdia/selleraccept&action=1&id="+id,
              function( data ) {                                       
                  SimpleLoading.stop();  
              }
          ); 
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
      <strong> ¡Nos encantaria que empieces a utilizar nuestra plataforma para ofrecer tus servicios! </strong>
        <p><?= Html::a('Configurar nuevo servicio a ofrecer', ['costos/create'], ['class' => 'btn btn-primary','style'=>'width:40%;']) ?></p>
    </p>
  </div>
</div>



            <h3 class="well text-center">
                Estos son los servicios a prestar que tienes programados
            </h3>



<table class="table table-hover">
        
            <tr>   
                <th>Fecha del servicio</th>                                          
                <th>Ciudad</th>
                <th>Direccion</th>                
                <th>Horario</th>                                
                <th>Costo Acordado</th>
                <th>¿Aceptar o cancelar?</th>
            </tr>
            <?php
            foreach ($servicios_prestar as $servicio){ 
                echo "<tr>";
                    
                    echo "<td> ";
                        echo '<span class="fa-stack fa-2x yeti" >';
                            echo '<i class="fa '.$servicio['icono'].' yeti fa-stack-1x fa-inverse"></i> ';       
                            
                    echo "</span>";
                    echo $servicio['fecha'];   
                    echo "</td>";

                    echo "<td>";
                            echo $servicio['ciudad'];                        
                    echo "</td>";
                    echo "<td>";
                            echo $servicio['dir'];                        
                    echo "</td>";

                    echo "<td>";
                            echo $servicio['horario'];                        
                    echo "</td>";

                    echo "<td>";
                            echo "$ ".Yii::$app->formatter->asCurrency($servicio['costo'], 'COP');                       
                    echo "</td>";

                    echo "<td>";
                    $acpt_1="";
                    $acpt_2="";
                    if($servicio['acpt']==null){
                        $acpt_1="";
                        $acpt_2="";                        
                    }else if($servicio['acpt']==1){
                        $acpt_1="checked";                        
                    }else if($servicio['acpt']==0){
                        $acpt_2="checked";
                    }
                    
                    echo '<div class="input-wrap">
                      
                        <label class="signup-radio">
                          <input type="radio" onclick ="acetptarTrabajo('.$servicio['servicio_id'].')" name="signup-gender'.$servicio['servicio_id'].'" '.$acpt_1.' />
                        <i></i>
                        <span>Aceptar</span>
                      </label>
                      <label class="signup-radio">
                        <input type="radio" onclick="cancelarTrabajo('.$servicio['servicio_id'].')" name="signup-gender'.$servicio['servicio_id'].'" id="signupFemale" '.$acpt_2.' />
                        <i></i>
                        <span>Cancelar</span>
                      </label>
                    </div>';
                        /*
                          echo '<div class="row">';

                            echo '<div class="col-lg-6">';                            
                              echo  \yii\bootstrap\Html::radio("acpt", false,['value' => $servicio['servicio_id'], 'name'=>'xdserv','onclick'=>'acetptarTrabajo('.$servicio['servicio_id'].')','label' => '<i class="far fa-check-square"></i> Aceptar']);
                            echo '</div>';

                            echo '<div class="col-lg-6">';                            
                              echo  \yii\bootstrap\Html::radio("acpt", false,['value' => $servicio['servicio_id'], 'name'=>'xdserv','onclick'=>'cancelarTrabajo('.$servicio['servicio_id'].')','label' => '<i class="far fa-window-close"></i> Cancelar']);
                            echo '</div>';

                          echo '</div>';
                          */

                    echo "</td>";




                echo "</tr>";
            }

            ?>


        </table>




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

