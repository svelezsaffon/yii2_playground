<script>

function myFunction1() {
    var boxesEL=document.getElementsByName('Servicioxdia[servicio]');    
    
    var found=false;
    for(var x=0; x < boxesEL.length; x++)   // comparison should be "<" not "<="
    {   
      found=found || boxesEL[x].checked;
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
    <h3 class="well text-center">Escoge el tipo de servicio que necesitas</h3>
  </div> 
  
  <div >

    <div class="row"> 
      <?php
        $dires=array();
        $index=0;
        foreach ($allServicios as $servicioe){ 
          $dires[$index]=$servicioe;
          $index=$index+1;
        }

      echo $form->field($model, 'servicio',['options' => ['id' => 'av_servicio']])->radioList(
      $dires  ,
    ['item' => function ($index, $label, $name, $checked, $value) {
        return
        '
      <div class="col-md-4 text-center panel panel-default">
          <div class="panel-body">
            <span class="fa-stack fa-4x"  >                
                <i class="fa fa-circle fa-stack-2x text-primary yeti"  ></i>
                <i class="fa '.$label->icon.' fa-stack-1x fa-inverse " ></i>        
            </span>            
            <div>
              <h4 class="yeti">'.$label->nombre.'</h4>
            </div>
            <hr>
            <div>
              <span class="badge">
                        '.\yii\bootstrap\Html::radio($name, $checked,['value' => $label->id, 'name'=>'xdserv','onclick'=>"myFunction1()",'label' => 'Seleccionar',]).',
              </span>
            </div>
        </div>
      </div> 
        ';
    }]
)->label(false);
  
?>  
</div>



  </div>




<div class=" row alert alert-danger" id="meserv" role="alert">
  <h3>Debes selecionar un servicio</h3>
</div>
