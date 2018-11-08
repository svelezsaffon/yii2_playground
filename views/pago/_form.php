<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use bookin\aws\checkbox\AwesomeCheckbox;
?>

<div class="pago-form">

  <div class="jumbotron">
    <div class="page-header">
      <h2>Metodos de pago <small> Estamos trabajando para añadir mas metodos de pago y asi simplificarte mucho mas todo este procesos</small></h2>
    </div>
  </div>
  <?php $form = ActiveForm::begin(); ?>



  <div class="row">   
    <h3 class="well text-center">Selecciona el metodo que mas te sirva</h3>
  </div> 

  <div class="row"> 
    <?php
    $dires=array();
    $index=0;
    foreach ($metodos as $metodo){ 
      $dires[$index]=$metodo;
      $index=$index+1;
    }

    echo $form->field($model, 'metodo')->radioList(
      $dires  ,
      ['item' => function ($index, $label, $name, $checked, $value) {
        return
        '
       <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img class="media-object" src="/basic/web/img/'.$label->image.'">
        <div class="caption">
            <h3 class="text-center">'.$label->nombre.'</h3>        
            <ul class="list-group">
                <li class="list-group-item">Cuenta de ahorros</li>
                <li class="list-group-item">#379-47654-25</li>
            </ul>      
        </div>

        <h3 class="text-center">Puedes utilizar un QR</h3>        
        <img class="media-object" src="/basic/web/img/qrservicios.jpeg">

        <div class="text-center">
            '.\yii\bootstrap\Html::radio($name, $checked,['value' => $label->id,'label' => 'Seleccionar',]).',
        </div>

    </div>

    <div class="btn-group">
        <a href="https://wa.me/573224966850" class="btn btn-primary active">
            <i class="fab fa-whatsapp"></i> comunicate por whatsapp - click aqui
        </a>    
    </div>

</div> 


        ';
      }]
      )->label(false);

      ?>  
    </div>   



    <div class="form-group text-right">
      <?= Html::submitButton('Pagar', ['class' => 'btn btn-success']) ?>
    </div>




    <?php ActiveForm::end(); ?>

  </div>
