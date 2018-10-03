<h2>¿Que direccion quieres utilizar?</h2>


<div class="container">

<?php	
	foreach ($trabajadores as $trabajador){
?>
	<div class="row">
    	<div class="col">

      		<div class="panel panel-info">
  				
  				<div class="panel-heading">
  					<?= $trabajador->nombre ?> 
  					<?= $trabajador->apellido ?>  						
				</div>
				
				<div class="panel-body">  		
					<div class="container">
  						<div class="row">			
							<div class="col col-lg-10">
								
    						</div>
    						<div class="col col-lg-2">
								<?= $form->field($model, 'trabajador')->radio(['label' => 'Selecionar', 'value' => $trabajador->id]) ?>
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