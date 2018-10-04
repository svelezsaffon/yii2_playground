	<div class="container">
<?php	
	$dires=array();
	$index=0;
	foreach ($allServicios as $servicioe){
		$dires[$index]=$servicioe;
		$index=$index+1;
	}
	
	 echo $form->field($model, 'servicio')->radioList(
    	$dires	,
    ['item' => function ($index, $label, $name, $checked, $value) {
        return
        '
        	<div class="row">
    			<div class="col">
      		<div class="panel panel-info">  				
  				<div class="panel-heading">
  					'.$label->nombre.'
				</div>				
				<div class="panel-body">  		
					<div class="container">
  						<div class="row">			
							<div class="col col-lg-10">								   
								'.$label->descripcion.'
    						</div>
    						<div class="col col-lg-2">    	
    						'.\yii\bootstrap\Html::radio($name, $checked,['value' => $label->id,'label' => 'Seleccionar']).'
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