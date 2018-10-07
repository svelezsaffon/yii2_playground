<?php
use yii\helpers\Html;
?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">¿Necesitas un servicio de solo un dia?</h3>
  </div>
  <div class="panel-body">

    <div class="row"> 
      <?php
      $size=sizeof($allServicios);
      foreach ($allServicios as $servicio) {
        echo '
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">      
              <div class="caption">
                <h3>'.$servicio->nombre.'</h3>
                <p></p>
                <p>'.Html::a('Seleccionar', ['/servicioxdia/create','step'=>"2",'serv'=>$servicio->id], ['class'=>' btn-primary btn-sm']).'</p>
              </div>
          </div>
        </div>
        ';
      }
    ?>    

    </div>

  </div>
</div>




