<?php

use yii\helpers\Url;
use yii\helpers\ArrayHelper;

?>

<div class="container">

<script>

function myFunction4() {
    var boxesEL=document.getElementsByName('Plane[trabajador]');    
    
    var found=false;
    for(var x=0; x < boxesEL.length; x++)   // comparison should be "<" not "<="
    {   
      found=found || boxesEL[x].checked;
    
    }


    if(found){      
      document.getElementById('meserv4').style.display="none";      
    }

    var axu=document.getElementById('finalstepsave');



    axu.disabled=!found;  
}
</script>

<?php 

  $dires=array();
  $index=0;
  foreach ($trabajadores as $servicioe){
    $dires[$index]=$servicioe;
    $index=$index+1;
  }
  
   echo $form->field($model, 'trabajador')->radioList(
      $dires  ,
    ['item' => function ($index, $label, $name, $checked, $value) {
        return
        '
          <div class="row">
          <div class="col">
          <div class="panel panel-default">         
          <div class="panel-heading">
            Empledo estrella #'.$index.'
        </div>        
        <div class="panel-body">      
          <div class="container">
              <div class="row">     
              <div class="col col-lg-10">                  
                '.$label['nombre'].' '.$label['apellido'].'
                </div>
                <div class="col col-lg-2">      
                  <span class="badge">
                    '.\yii\bootstrap\Html::radio($name, $checked,['value' => $label['id'],'onclick'=>"myFunction4()",'label' => 'Seleccionar',]).'
                 </span>
              </div>
            </div>
          </div>
        </div>
      </div>   
    </div>
  </div>  
        ';
    }]
)->label(false);  
?>      

</div>



<div class="alert alert-danger" id="meserv4" role="alert">
  <h3>Debes selecionar una empleado que haga tu servicio</h3>
</div>