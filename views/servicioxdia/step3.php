<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use lo\widgets\modal\ModalAjax;
use yii\bootstrap\Modal;
?>

<style type="text/css">
	.list-group-item {
background-color: transparent;
border: 0px solid #ddd;
}
</style>

<script>

function myFunction3() {
    var boxesEL=document.getElementsByName('Servicioxdia[direccion]');    
    
    var found=false;
    for(var x=0; x < boxesEL.length; x++)   // comparison should be "<" not "<="
    {   
      found=found || boxesEL[x].checked;
    }

    var axu=document.getElementById('nextstep3');

     if(found){      
      document.getElementById('meserv3').style.display="none";      
    }

    axu.disabled=!found;  
}
</script>

<div class="container">

	<h3 class="text-center">Seleciona la direccion donde el servicio sera realizado</h3>

	<?php	
	$dires=array();
	$index=0;
	foreach ($direcciones as $servicioe){
		$dires[$index]=$servicioe;
		$index=$index+1;
	}


		echo '<ul class="media-list">';
		echo $form->field($model, 'direccion')->radioList(
			$dires	,
			['item' => function ($index, $label, $name, $checked, $value) {
				return
				'
				<div class="row well">
					<div class="col-md-10">
					
					<li class="media">
    					<div class="media-left">
      						<a>
        						<img class="media-object" src="https://maps.googleapis.com/maps/api/staticmap?center='.$label->puntos_referencia.'&markers=color:green|label:S|'.$label->puntos_referencia.'&zoom=18&size=250x130&maptype=roadmap&key=AIzaSyD5BJZw2s9kaHkVsAoODp5i1xkfet2-wsI">	
      						</a>
    					</div>
    					<div class="media-body">
      						<h4 class="media-heading">'.$label->nombre.'</h4>
      						<ul class="list-group">
  								<li class="list-group-item" > <strong>Direccion:</strong> '.$label->direccion.'</li>
  								<li class="list-group-item"><strong>Recibe:</strong> '.$label->quien_recibe.'</li>
							</ul>
    					</div>
  					</li>
  					</div>

  					<div class="col-md-2">
              <span class="badge">
  					   '.\yii\bootstrap\Html::radio($name, $checked,['value' => $label->id,'onclick'=>"myFunction3()",'label' => 'Seleccionar',]).'
              </span>
  					</div>

				</div>	
				';
			}]
			)->label(false);
		echo '</ul>';			
		?>

</div>



<div class="alert alert-danger" id="meserv3" role="alert">
  <h3>Debes selecionar una direccion</h3>
</div>