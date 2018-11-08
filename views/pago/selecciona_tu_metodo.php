<?php
use bookin\aws\checkbox\AwesomeCheckbox;
?>


<script>

  function myFunction1() {
    var boxesEL=document.getElementsByName('Pago[metodo]');    
    
    var found=false;
    for(var x=0; x < boxesEL.length; x++)   // comparison should be "<" not "<="
    {   
      found=found || boxesEL[x].checked;
    }

    var axu=document.getElementById('nextstep1');

    if(!found){
      document.getElementById('meserv').innerHTML="Deber selecionar un Metodo de pago!!";      
    }else{
      document.getElementById('meserv').style.display="none";      
    }

    axu.disabled=!found;  
  }
</script>

<div class="row">

  <div class="col-lg-6">
    <?=$form->field($model, 'metodo')->widget(AwesomeCheckbox::classname(),['options'=>['onclick'=>"myFunction1()",'value'=>'qrbanc','id'=>'metodo-qa',],'style'=>[AwesomeCheckbox::STYLE_CIRCLE,AwesomeCheckbox::STYLE_PRIMARY],])->label('QA Bancolombia')?>
  </div>
  
  <div class="col-lg-6">
    <?=$form->field($model, 'metodo')->widget(AwesomeCheckbox::classname(),['options'=>['onclick'=>"myFunction1()",'value'=>'payu','id'=>'metodo-payu',],'style'=>[AwesomeCheckbox::STYLE_CIRCLE,AwesomeCheckbox::STYLE_PRIMARY],])->label('Payu')?>
  </div>


</div>



<div class="alert alert-danger" id="meserv" role="alert">
  <h3>Debes selecionar un servicio</h3>
</div>