<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use lo\widgets\modal\ModalAjax;

?>

<?php if($upuser == false){ ?>

<div class="row">
  <div class="jumbotron text-cnter">                    
    <h1 class="section-heading">
      Hola, <?=Html::encode($userinfo->nombre)?> <?=Html::encode($userinfo->apellidos)?>!
    </h1>  
    <p>
      Nos encantaria comenzar a trabajar para ti! Comienza configurando tus Servicios
    </p>
  </div>
</div>

<div class="text-center">

  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <span class="fa-stack fa-4x yeti" >        
        <i class="fa fa-circle fa-stack-2x text-primary yeti"></i>        
        <i class="fa fa-question fa-stack-1x fa-inverse"></i>        
      </span>
      <h4 class="service-heading yeti">
        Contratar con nostros es muy facil, tienes dos tipos de servicios
      </h4>

    </div>    
  </div>
  
  <div class="row">

    <div class="col-md-6">    
      <a href="#portfolio">
        <span class="fa-stack fa-4x" >        
          <i class="fa fa-circle fa-stack-2x text-primary yeti"></i>        
          <i class="fa fa-sun fa-stack-1x fa-inverse"></i>        
        </span>
        <h4 class="service-heading yeti">Por dias</h4>
      </a>
    </div>

    <div class="col-md-6">
      <a href=<?= Url::toRoute(['/plane/create']);?>>
        <span class="fa-stack fa-4x"  >                
        <i class="fa fa-circle fa-stack-2x text-primary yeti"></i>        
          <i class="fa fa-calendar-alt fa-stack-1x fa-inverse"></i>        
        </span>
        <h4 class="service-heading yeti">Recurrente</h4>
      </a>
    </div>
  </div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>

<section id="portfolio">

  <div class="container text-center">
  
    <div class="row">
      

  <div class="jumbotron text-cnter">                    
    <h1 class="section-heading">
      Servicios por dias
    </h1>  
    <p class="section-subheading text-muted">
      ¿Necesitas un contratar un servicio solo por un dia?
    </p>
  </div>

  
    <div class="row">
     <?php                  
     foreach ($allServicios as $servicio) {
      ?>                      
      <div class="col-md-4 col-sm-6 portfolio-item">
        <a href=<?= Url::toRoute(['/servicioxdia/create','step'=>"2",'serv'=>$servicio->id]);?> class="portfolio-link" data-toggle="modal">
          <span class="fa-stack fa-4x"  >                
            <i class="fa fa-circle fa-stack-2x text-primary yeti"  ></i>
            <?php echo '<i class="fa '.$servicio->icon.' fa-stack-1x fa-inverse " ></i>'?>        
          </span>

          <div>
            <h4 class="yeti"><?=$servicio->nombre?></h4>                        
          </div>
        </a>

      </div>                
      <?php } ?>
    </div>

  </div>



</section>



<?php }else{?>

<div class="alert alert-danger text-center" role="alert">
  <div class="row">
    <h1>Necesitamos que completes la informacion de tu perfil</h1>
  </div>
  <div class="row text-center">
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

