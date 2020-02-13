<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
$this->title = 'Direcciones registradas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="direccion-index">


<?php 
if($cuentaver==true){
?>

    <div class="container top-buffer-null">


            <div class="row">
                <div class="jumbotron">
                    <h2 class="section-heading"><?= Html::encode($this->title) ?></h2>
                    <p>
                        En este seccion encontraras todas tu direcciones donde podras hacer llegar los servicios que contrates. Las direcciones son el paso inicial para empezar a recibir nuestros servicios
                    </p>
                    <p><?= Html::a('Crear direccion', ['create'], ['class' => 'btn btn-primary']) ?></p>
                </div>
            </div>

        <?php 
        if (empty($direcciones)==false) { 
            ?>
            
            <h3 class="well text-center">
                Estas son las direcciones registradas
            </h3>
            
            
            
            <div class="row text-center">

                <?php
                foreach($direcciones as $dir){
                    ?>
                    <div class="col-md-4">

                        <div class="media">
                          <div class="media-left">

                            <?php 
                            echo '<img class="img-thumbnail" src="https://maps.googleapis.com/maps/api/staticmap?center='.$dir['puntos_referencia'].'&markers=color:green|label:S|'.$dir['puntos_referencia'].'&zoom=18&size=550x270&maptype=roadmap&key=AIzaSyD5BJZw2s9kaHkVsAoODp5i1xkfet2-wsI">'
                            ?>

                        </div>

                    </div>


                    <h4 class="service-heading"><?=$dir['nombre']?></h4>
                    <p class="text-muted">
                        <?=substr($dir['direccion'], 0, 50)?>
                    </p>
                    <p class="text-muted">
                        <?=substr($dir['ciudad'], 0, 50)?>
                    </p>
                    <div class="row">
                        <div class="col-md-3 col-md-offset-3">
                            <a href=<?= Url::toRoute(['/direccion/view','id'=>$dir['id']]);?> > <i class="fa yeti fa-search fa-2x"></i>
                                <div class="row yeti">Ver</div>
                            </a>

                        </div>
                        
                        <div class="col-md-3">
                            
                            <a href=<?= Url::toRoute(['/direccion/update','id'=>$dir['id']]);?> > <i class="fa yeti fa-edit fa-2x"></i>
                                <div class="row yeti">Editar</div>
                            </a>

                        </div>

                    </div>

                </div>

                <?php                    
            }
            ?>
        </div>


        <?php
    }
    ?>    

</div>
<?php }else{ ?>

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


<?php } ?>

</div>
