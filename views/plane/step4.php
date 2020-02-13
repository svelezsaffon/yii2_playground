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
      console.log(boxesEL[x].checked);

    }



    if(found){      
      document.getElementById('meserv4').style.display="none";      
    }

    var axu=document.getElementById('finalstepplanes');

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