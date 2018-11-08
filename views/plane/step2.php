<?php

use yii\helpers\Html;
use dosamigos\datepicker\DatePicker;
use bookin\aws\checkbox\AwesomeCheckbox;

?>

<script>

  function myFunction2() {
    var boxesEL=document.getElementsByName('Plane[timepo]');    
    
    var found=false;
    var fecha=false;
    for(var x=0; x < boxesEL.length; x++)   // comparison should be "<" not "<="
    {   
      found=found || boxesEL[x].checked;
    }

    fecha= document.getElementById('plane-fecha_inicia').value!='';

    var day=false;
    day=day||document.getElementById('plane-lunes').checked;
    day=day||document.getElementById('plane-martes').checked;
    day=day||document.getElementById('plane-miercoles').checked;
    day=day||document.getElementById('plane-jueves').checked;
    day=day||document.getElementById('plane-viernes').checked;
    day=day||document.getElementById('plane-sabado').checked;
    day=day||document.getElementById('plane-domingo').checked;


    if(found && fecha && day){
      document.getElementById('meserv2').style.display="none";
    }else if(!found && fecha && day){
      document.getElementById('meserv2').style.display="block";
      document.getElementById('meserv2').innerHTML="<h2>Deber selecionar un horario!!</h2>";      
    }else if(found && !fecha && day) {
      document.getElementById('meserv2').style.display="block";
      document.getElementById('meserv2').innerHTML="<h3>Deber selecionar la fecha que comienza tu servicio!!</h3>";      
    }else if(found && fecha && !day){
      document.getElementById('meserv2').style.display="block";
      document.getElementById('meserv2').innerHTML="<h3>Deber selecionar al menos un dia!!</h3>";      
    }else if(!found && !fecha && day){
      document.getElementById('meserv2').style.display="block";
      document.getElementById('meserv2').innerHTML="<h3>Dees seleccionar el horario y la fecha</h3>";      
    }else if(found && !fecha && !day){
      document.getElementById('meserv2').style.display="block";
      document.getElementById('meserv2').innerHTML="<h3>Dees seleccionar la fecha y al menos un dia</h3>";      
    }


    found=found && day && fecha;

    document.getElementById('nextstep2').disabled=!found;
  }
</script>

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
          'options'=>['onchange'=>"myFunction2()",],  
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
            <?=$form->field($model, 'lunes')->widget(AwesomeCheckbox::classname(),['options'=>['onclick'=>"myFunction2()",],'style'=>[AwesomeCheckbox::STYLE_CIRCLE,AwesomeCheckbox::STYLE_PRIMARY],])->label(false)?>
          </div>
          <div class="col-lg-4">
            <?=$form->field($model, 'martes')->widget(AwesomeCheckbox::classname(),['options'=>['onclick'=>"myFunction2()",],'style'=>[AwesomeCheckbox::STYLE_CIRCLE,AwesomeCheckbox::STYLE_PRIMARY],])->label(false)?>
          </div>
          <div class="col-lg-4">
            <?=$form->field($model, 'miercoles')->widget(AwesomeCheckbox::classname(),['options'=>['onclick'=>"myFunction2()",],'style'=>[AwesomeCheckbox::STYLE_CIRCLE,AwesomeCheckbox::STYLE_PRIMARY],])->label(false)?>
          </div>

        </div>

        <div class="row">

          <div class="col-lg-4">
            <?=$form->field($model, 'jueves')->widget(AwesomeCheckbox::classname(),['options'=>['onclick'=>"myFunction2()",],'style'=>[AwesomeCheckbox::STYLE_CIRCLE,AwesomeCheckbox::STYLE_PRIMARY],])->label(false)?>
          </div>

          <div class="col-lg-4">
            <?=$form->field($model, 'viernes')->widget(AwesomeCheckbox::classname(),['options'=>['onclick'=>"myFunction2()",],'style'=>[AwesomeCheckbox::STYLE_CIRCLE,AwesomeCheckbox::STYLE_PRIMARY],])->label(false)?>
          </div>

          <div class="col-lg-4">
            <?=$form->field($model, 'sabado')->widget(AwesomeCheckbox::classname(),['options'=>['onclick'=>"myFunction2()",],'style'=>[AwesomeCheckbox::STYLE_CIRCLE,AwesomeCheckbox::STYLE_PRIMARY],])->label(false)?>
          </div>

        </div>

        <div class="row">
          <div class="col-lg-12">
            <?=$form->field($model, 'domingo')->widget(AwesomeCheckbox::classname(),['options'=>['onclick'=>"myFunction2()",],'style'=>[AwesomeCheckbox::STYLE_CIRCLE,AwesomeCheckbox::STYLE_PRIMARY],])->label(false)?>
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
        ['4am'=>"4 Horas - Madrugada - 8:00am a 12:00pm",'4pm'=>"4 Horas - Tarde - 1:30pm a 5:30pm",'8ful'=>"8 Horas - Dia Entero- 8:00am a 5:00pm"]      ,
        ['item' => function ($index, $label, $name, $checked, $value) {
          return 
          '
          <div class="well">
            <div class="row">
              <div class="col-lg-10">'.$label.'</div>
              <div class="col-lg-2">'.\yii\bootstrap\Html::radio($name, $checked,['value' => $value,'onclick'=>"myFunction2()",'label' => 'Seleccionar',])
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



    <div class="alert alert-danger" id="meserv2" role="alert">
      <h3>Debes seleccionar una fecha, al menos un dia y el horario de tu servicio</h3>
    </div>









