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


<div class="container">

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
			<div class="col-md-4">      
        		<div class="panel panel-primary">
          			<div class="panel-body text-center">        
            			 <div class="col-md-12" align="center">
            			 <img class="media-object" src="https://maps.googleapis.com/maps/api/staticmap?center='.$label['puntos_referencia'].'&markers=color:green|label:S|'.$label['puntos_referencia'].'&zoom=18&size=250x130&maptype=roadmap&key=AIzaSyD5BJZw2s9kaHkVsAoODp5i1xkfet2-wsI">
            			 </div>
            			 <br>
            			<h4 class="service-heading yeti"> '.$label['nombre'].'</h4>          
            			<h6 class="service-heading yeti"> Direccion '.$label['direccion'].' </h6>
            			<h6 class="service-heading yeti"> Ciudad '.$label['ciudad'].' </h6>            
            			<h6 class="service-heading yeti"> Recibe '.$label['quien_recibe'].' </h6>  
            	        <span class="badge">
  					   '.\yii\bootstrap\Html::radio($name, $checked,['value' => $label['id'],'onclick'=>"verify_all_step3_dias(".$label['id'].")",'label' => 'Seleccionar',]).'
              			</span>       
          			</div>
        		</div>      
    		</div>
			'
			;
			}]
			)->label(false);
		echo '</ul>';			
		?>

</div>



<div class="alert alert-danger" id="meserv3" role="alert">
  <h3>Debes selecionar una direccion</h3>
</div>