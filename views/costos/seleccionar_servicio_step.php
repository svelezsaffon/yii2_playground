<?php 
use yii\helpers\Html;
?>
<script>

function enableNextButton() {
    
    var boxesEL=document.getElementsByName('Costos[servicio]');    
    
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

    var axu=document.getElementById('nextstep1');

    if(!found){
      
      document.getElementById('meserv').innerHTML="Deber selecionar un servicio!!";      

    }else{
 
      document.getElementById('meserv').style.display="none";      
 
    }

    axu.disabled=!found;



}
</script>


<div class="row">   
    <h3 class="well text-center">Escoge el tipo de servicio que prestas</h3>
  </div> 
  
    <div class="row"> 
      <?php

        $dires=array();
        $index=0;
        foreach ($lista_servicios as $servicioe){
          $dires[$index]=['servi'=>$servicioe,];
          $index=$index+1;
        }

      echo $form->field($model, 'servicio',['options' => ['id' => 'av_servicio']])->radioList(
      $dires  ,
    [
    'item' => function ($index, $label, $name, $checked, $value) {

        return
        '
      <div class="col-md-4 text-center panel panel-default">
          <div class="panel-body">
            
            <span class="fa-stack fa-4x"  >                
                <i class="fa fa-circle fa-stack-2x text-primary yeti"  ></i>
                <i class="fa '.$label['servi']->icon.' fa-stack-1x fa-inverse " ></i>        

            </span>            
           
            <hr>
            <div>
                <h4 class="yeti">'.$label['servi']->nombre.'</h4> 
            </div>
                        
            <div>
              <span class="badge"> 
                    '.\yii\bootstrap\Html::radio($name, $checked,['value' => $label['servi']->id, 'name'=>'xdserv','onclick'=>'enableNextButton()','label' => 'Seleccionar']).'
              </span>
            </div>

        </div>
      </div> 
        ';
    }]
)->label(false);
  
?>  
  </div>




