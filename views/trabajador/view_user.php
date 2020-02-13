<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Trabajador */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Trabajadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trabajador-view">

  <div class="row">
    <div class="col-md-5 col-md-offset-3">
      
        <div class="panel panel-primary">
          <div class="panel-body text-center">        
            <span class="fa-stack fa-4x" >        
              <i class="fa fa-circle fa-stack-2x text-primary yeti"></i>        
              <i class="fa fa-smile-beam fa-stack-1x fa-inverse"></i>        
            </span>
            <h4 class="service-heading yeti"> <?= $model->nombre." ".$model->apellido ?> </h4>          
            <h5 class="service-heading yeti"> lleva con nostros <?= $model->anosexperiencia ?> años </h5>          
            <h5 class="service-heading yeti"> Ha completado <?= $model->serviciosprestados ?> servicios exitosamente</h5>          
          </div>
        </div>
      
    </div>
  </div>

</div>
