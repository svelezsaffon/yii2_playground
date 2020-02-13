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
      $dires[$index]=['metodo'=>$metodo,'pago'=>$model];
      $index=$index+1;
    }
    

    echo $form->field($model, 'metodo')->radioList(
      $dires  ,
      ['item' => function ($index, $label, $name, $checked, $value) {
        return
        '
       <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img class="media-object" src="img/'.$label['metodo']->image.'">
        <div class="caption">
            <h3 class="text-center">$ '.Yii::$app->formatter->asCurrency($label['pago']->monto, 'COP').'</h3>        
            <ul class="list-group">
                <li class="list-group-item">Cuenta de ahorros</li>
                <li class="list-group-item">#059-000290-14</li>
            </ul>      
        </div>

        <h4 class="text-center">Utiliza el APP Bancolombia para hacer to pago y envianos el recibo al 
          <i class="fab fa-whatsapp"> 3008080860</i>
        </h4>        

        <a href="img/qrservicios.png" download>
          <img class="media-object" src="img/qrservicios.png">
        </a>

        <div class="text-center">
            '.\yii\bootstrap\Html::radio($name, $checked,['value' => $label['metodo']->id,'label' => 'Seleccionar',]).',
        </div>

    </div>

    <div class="btn-group">
        <a href="https://wa.me/573008080860" class="btn btn-primary active">
            <i class="fab fa-whatsapp"></i> Escribenos en whatsapp - click aqui
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
