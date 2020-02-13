<?php

use yii\helpers\Html;
use dosamigos\datepicker\DatePicker;
use bookin\aws\checkbox\AwesomeCheckbox;

?>

<script>

  function myFunction2() {
    var boxesEL=document.getElementsByName('Servicioxdia[tiempo]');    
    
    var found=false;
    var fecha=false;
    for(var x=0; x < boxesEL.length; x++)   // comparison should be "<" not "<="
    {   
      found=found || boxesEL[x].checked;
    }


    fecha= document.getElementById('servicioxdia-fecha_inicia').value!='';

    if(found && fecha){
      document.getElementById('meserv2').style.display="none";      
      
    }else if(!found && fecha){
      document.getElementById('meserv2').innerHTML="<h2>Deber selecionar un horario!!</h2>";      
    }else if(found && !fecha) {
      document.getElementById('meserv2').innerHTML="<h3>Deber selecionar la fecha que comienza tu servicio!!</h3>";      
    }

    found=found && fecha;
    document.getElementById('nextstep2').disabled=!found;
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

    <?php echo $form->field($model, 'tiempo')->dropDownList(); ?>

<!--
              <?php 
/*
        echo $form->field($model, 'tiempo')->radioList(
          ['4am'=>"4 Horas - 8:00am a 12:00pm",'4pm'=>"4 Horas - 1:30pm a 5:30pm",'8ful'=>"8 Horas - 8:00am a 5:00pm"]      ,
          ['item' => function ($index, $label, $name, $checked, $value) {
            return 
            '
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="col-lg-8">'.$label.'</div>
                  <div class="col-lg-4">
                    <span class="badge">
                        '.\yii\bootstrap\Html::radio($name, $checked,['value' => $value,'onclick'=>"myFunction2()",'name'=>'xdhora','label' => 'Seleccionar',]).'
                    </span>
                  </div>    
                </div>
              </div>      
              '; 
            }]
            )->label(false);

            ?>
*/
-->
    </div>

  </div>




</div>



<div class="alert alert-danger row" id="meserv2" role="alert">
  <h3>Debes seleccionar una fecha y un horario</h3>
</div>







