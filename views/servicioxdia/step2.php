<?php

use yii\helpers\Html;
use dosamigos\datepicker\DatePicker;
use bookin\aws\checkbox\AwesomeCheckbox;

?>

<script>

  function myFunction2() {
       
    
    var fecha=false;   


    fecha_val = document.getElementById('servicioxdia-fecha_inicia').value;
    fecha=fecha_val != '';


    if(fecha){
      document.getElementById('meserv2').style.display="none";

      update_pasos('text2q',"Fecha: "+fecha_val);      
    
    }else if(!fecha) {
      document.getElementById('meserv2').innerHTML="<h3>Deber selecionar la fecha que comienza tu servicio!!</h3>";      
    }
    
    document.getElementById('nextstep2').disabled=!fecha;
  }
</script>



<div class="row">

  <div class="col-md-5">
    <div class="row">
      <div class="well well-md text-center">
        <h4> <?= Html::encode('¿Que dia necesitas tu servicio?') ?></h4>
      </div>
    </div>
    <div class="row">
      <?= $form->field($model, 'fecha_inicia')->widget(
        DatePicker::className(), [
        'inline' => true,          
        'options'=>['onchange'=>"myFunction2()", ],
        'template' => '<div class="text-center">{input}</div>',

        'clientOptions' => [          
        'autoclose' => true,
        'startDate' => date('Y-m-d', time()+86400),
        'format' => 'yyyy-mm-dd',  
        'todayBtn' => true,        
        ],

        ]
        )->label(false);
        ?>        
      </div>
    </div>

    <div class="col-md-5 col-sm-offset-1">
     <div class="row">
      <div class="well well-md text-center"> 
        <h4> <?= Html::encode('¿Que dia necesitas tu servicio?') ?></h4>
      </div>
    </div>

    <div class="row">
      
      <?php 
        if(isset($horarios)){
            echo $form->field($model, 'tiempo')->dropDownList($horarios); 
        }else{
            echo $form->field($model, 'tiempo')->dropDownList([]);       
        }        

      ?>

    </div>

  </div>


</div>

<div class="alert alert-danger row" id="meserv2" role="alert">
  <h3>Debes seleccionar una fecha y un horario</h3>
</div>








