<?php

use yii\helpers\Html;
use dosamigos\datepicker\DatePicker;
use bookin\aws\checkbox\AwesomeCheckbox;

?>

<div class="row">

  <div class="col-lg-5">

    <div class="panel panel-default">  
      <div class="panel-heading">
        <h3> <?= Html::encode('¿Que dia quieres comenzar tu plan?') ?></h3>
      </div>
      
      <div class="panel-body">
        <?= $form->field($model, 'fecha_inicia')->widget(
          DatePicker::className(), [
          'inline' => true,          
          'template' => '<div class="well">{input}</div>',
          'clientOptions' => [
          'autoclose' => true,
          
          'format' => 'yyyy-mm-dd'
          ]

          ]
          )->label(false);
          ?>          
        </div>
      </div>  
    </div> 


    <div class="col-lg-1"></div>


    <div class="col-lg-5">
      <div class="row">
        <div class="panel panel-default">        
          <div class="panel-heading">
            <h3>
              <?= Html::encode('¿Que recurrencia del servicio?') ?>            
            </h3>
          </div>
          <div class="panel-body">
           <?= $form->field($model, 'semanal')->dropDownList([true => 'Semanal', false => 'Quincenal'] )->label(false)?>
         </div>
       </div>
     </div>
     <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading"><h3> <?= Html::encode('¿Que dias de la semana necesitas el servicio?') ?></h3></div>
      <div class="panel-body">

        <div class="row">

          <div class="col-lg-4">
            <?=$form->field($model, 'lunes')->widget(AwesomeCheckbox::classname(),['style'=>[AwesomeCheckbox::STYLE_CIRCLE,AwesomeCheckbox::STYLE_PRIMARY],])->label(false)?>
          </div>
          <div class="col-lg-4">
            <?=$form->field($model, 'martes')->widget(AwesomeCheckbox::classname(),['style'=>[AwesomeCheckbox::STYLE_CIRCLE,AwesomeCheckbox::STYLE_PRIMARY],])->label(false)?>
          </div>
          <div class="col-lg-4">
            <?=$form->field($model, 'miercoles')->widget(AwesomeCheckbox::classname(),['style'=>[AwesomeCheckbox::STYLE_CIRCLE,AwesomeCheckbox::STYLE_PRIMARY],])->label(false)?>
          </div>

        </div>

        <div class="row">

          <div class="col-lg-4">
            <?=$form->field($model, 'jueves')->widget(AwesomeCheckbox::classname(),['style'=>[AwesomeCheckbox::STYLE_CIRCLE,AwesomeCheckbox::STYLE_PRIMARY],])->label(false)?>
          </div>

          <div class="col-lg-4">
            <?=$form->field($model, 'viernes')->widget(AwesomeCheckbox::classname(),['style'=>[AwesomeCheckbox::STYLE_CIRCLE,AwesomeCheckbox::STYLE_PRIMARY],])->label(false)?>
          </div>

          <div class="col-lg-4">
            <?=$form->field($model, 'sabado')->widget(AwesomeCheckbox::classname(),['style'=>[AwesomeCheckbox::STYLE_CIRCLE,AwesomeCheckbox::STYLE_PRIMARY],])->label(false)?>
          </div>

        </div>

        <div class="row">
          <div class="col-lg-12">
            <?=$form->field($model, 'domingo')->widget(AwesomeCheckbox::classname(),['style'=>[AwesomeCheckbox::STYLE_CIRCLE,AwesomeCheckbox::STYLE_PRIMARY],])->label(false)?>
          </div>
        </div>

      </div>
      </div>
  </div> 

</div>


<div class="row">

<div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading"><h3> <?= Html::encode('¿En que horario necesitas el servicio?') ?></h3></div>
      <div class="panel-body">

      <?php 
  
   echo $form->field($model, 'timepo')->radioList(
      ['4am'=>"4 Madrugada",'4pm'=>"4 Tarde",'8ful'=>"8 Tiempo completo"]      ,
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









