<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;

?>

<div class="container">

<script>

function myFunction4(id_emp) {
    var boxesEL=document.getElementsByName('Servicioxdia[trabajador]');    
    
    var found=false;
    for(var x=0; x < boxesEL.length; x++)
    {   
      found=found || boxesEL[x].checked;
    
    }

    if(found){      
      document.getElementById('meserv4').style.display="none";
      getEmpleadoName(id_emp);      
    }

    var axu=document.getElementById('finalstepsave');    

    axu.disabled=!found;  
}
</script>


<?php	
  echo $form->field($model, 'trabajador')->radioList([])->label(false);	
?>			

</div>



<div class="alert alert-danger" id="meserv4" role="alert">
  <h3>Debes selecionar una empleado que haga tu servicio</h3>
</div>