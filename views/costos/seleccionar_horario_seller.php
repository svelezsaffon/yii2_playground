<?php 
use yii\helpers\Html;
?>

<script>

function enableSaveButton() {
    
    var boxesEL=document.getElementsByName('Costos[horario]');    
    
    var found=false;
    
    var value;
    
    for(var x=0; x < boxesEL.length; x++) 
    {   
      found=found || boxesEL[x].checked;

      if(found){
        value=boxesEL[x].value;
        break;
      }
    }

    var axu=document.getElementById('finalstepsave');

    if(!found){
      
      document.getElementById('meserv').innerHTML="Deber selecionar un servicio!!";      

    }else{
 
      document.getElementById('meserv').style.display="none";      
 
    }

    axu.disabled=!found;



}
</script>

<div class="row">   
    <h3 class="well text-center">Escoge el horario en que prestas el servicio</h3>
  </div> 
  
    <div class="row"> 

      <ul class="list-group">

      <?php

        $dires=array();
        $index=0;
        foreach ($lista_horarios as $servicioe){
          $dires[$index]=['servi'=>$servicioe,];
          $index=$index+1;
        }

      echo $form->field($model, 'horario',['options' => ['id' => 'av_servicio']])->radioList(
      $dires  ,
    [
    'item' => function ($index, $label, $name, $checked, $value) {

        return
        '
        <li class="list-group-item">
          <span class="badge">'.\yii\bootstrap\Html::radio($name, $checked,['value' => $label['servi']->id, 'name'=>'xdserv','onclick'=>'enableSaveButton()','label' => 'Seleccionar']).'</span>
            '. $label['servi']->descripcion.'
        </li>
        ';
    }]
)->label(false);
  
?>  
  </div>

</ul>

<div class=" row alert alert-danger" id="meserv" role="alert">
  <h3>Debes selecionar un horario en el que deseas atender</h3>
</div>