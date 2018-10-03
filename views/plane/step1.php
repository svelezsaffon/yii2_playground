
<div class="container">

<?php	
	foreach ($allServicios as $servicio){
?>
	<div class="row">
    	<div class="col">

      		<div class="panel panel-info">
  				
  				<div class="panel-heading">
  					<?= $servicio->nombre ?>  						
				</div>
				
				<div class="panel-body">  		
					<div class="container">
  						<div class="row">			
							<div class="col col-lg-10">
								<?= $servicio->descripcion ?>   
    						</div>
    						<div class="col col-lg-2">
								<?= $form->field($model, 'servicio')->radio(['label' => 'Selecionar', 'value' => $servicio->id]) ?>
							</div>
						</div>
					</div>
				</div>

			</div>   

		</div>
	</div>			   	
<?php
	}
?>				

</div>