<?php

use yii\helpers\Html;
use dosamigos\datepicker\DatePicker;
use bookin\aws\checkbox\AwesomeCheckbox;

?>

<div class="row">

  

    <div class="panel panel-default">  
      <div class="panel-heading">
        <h3> <?= Html::encode('¿Que dia necesitas tu servicio?') ?></h3>
      </div>
      
      <div class="panel-body">
        <?= $form->field($model, 'fecha_inicia')->widget(
          DatePicker::className(), [
          'inline' => true,          
          'template' => '<div class="well">{input}</div>',
          'clientOptions' => [
          'autoclose' => true,
          'startDate' => date('Y-m-d', time()+86400),
          'format' => 'yyyy-mm-dd'
          ]

          ]
          )->label(false);
          ?>          
        </div>
      </div>  
  


</div>


<div class="row">

<div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading"><h3> <?= Html::encode('¿En que horario necesitas el servicio?') ?></h3></div>
      <div class="panel-body">

      <?php 
  
   echo $form->field($model, 'tiempo')->radioList(
      ['4am'=>"4 Horas - 8:00am a 12:00pm",'4pm'=>"4 Horas - 1:30pm a 5:30pm",'8ful'=>"8 Horas - 8:00am a 5:00pm"]      ,
    ['item' => function ($index, $label, $name, $checked, $value) {
        return 
        '
        <div class="well">
          <div class="row">
            <div class="col-lg-10">'.$label.'</div>
            <div class="col-lg-2">'.\yii\bootstrap\Html::radio($name, $checked,['value' => $value,'label' => 'Seleccionar',])
        .'</div>    
          </div>
        </div>      
        '; 
    }]
)->label(false);
  
?>

      </div>
</div>      


</div>









