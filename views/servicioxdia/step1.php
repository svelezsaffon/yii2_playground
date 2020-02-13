<?php 
use yii\helpers\Html;
?>

<script>
  function obenter(id) {

    SimpleLoading.start('gears');
    
    $.post("index.php?r=horarioxservicio/list&idtrabajo="+id,
              function( data ) {
                  obtenerNombre(id);                       
                  $("select#servicioxdia-tiempo" ).html(data);                  
                  SimpleLoading.stop();  
              }
          ); 

  }

  function obtenerNombre(id){
    
    $.get("index.php?r=servicios/getname&id="+id,
              function( data ) {                  
                  update_pasos('text1q',data);
              }
          );
  }

</script>

<script>

function myFunction1() {
    
    var boxesEL=document.getElementsByName('Servicioxdia[servicio]');    
    
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
 
      obenter(value);
       
    }

    axu.disabled=!found;



}
</script>

  <div class="row">   
    <h3 class="well text-center">Escoge el tipo de servicio que necesitas</h3>
  </div> 
  
    <div class="row"> 
      <?php

        $dires=array();
        $index=0;
        foreach ($allServicios as $servicioe){
          $costo_full=0;
          foreach($costos as $costo){
            if ($costo["servicio"] == $servicioe->id){              
              $costo_full=$costo["value"];
              break;
            }
          }

          $dires[$index]=['servi'=>$servicioe,'costo'=>$costo_full];
          $index=$index+1;
        }

      echo $form->field($model, 'servicio',['options' => ['id' => 'av_servicio']])->radioList(
      $dires  ,
    [
    'item' => function ($index, $label, $name, $checked, $value) {

        if(isset($_GET["serv"])){
          if(intval($_GET["serv"])==intval($label['servi']->id)){
            $checked=true;            
          }else{$checked=false;}
        }

        return '
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="media">
                                <div class="media-body">
                                    <img src="img/servicios/'.$label['servi']->image.'" class="img-responsive center-block">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="grey-text section-subheading">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>'.$label['servi']->nombre.'</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>Desde $'.Yii::$app->formatter->asCurrency($label['costo'], '').' COP</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">                          
                              '.\yii\bootstrap\Html::radio($name, $checked,['value' => $label['servi']->id, 'name'=>'xdserv','onclick'=>'myFunction1()','label' => 'Seleccionar']).'                          
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


<div class=" row alert alert-danger" id="meserv" role="alert">
  <h3>Debes selecionar un servicio</h3>
</div>


