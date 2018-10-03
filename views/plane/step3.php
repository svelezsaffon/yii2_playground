<h2>¿Que direccion quieres utilizar?</h2>


<div class="container">

<?php	
	foreach ($direcciones as $direccion){
?>
	<div class="row">
    	<div class="col">

      		<div class="panel panel-info">
  				
  				<div class="panel-heading">
  					<?= $direccion->nombre ?>  						
				</div>
				
				<div class="panel-body">  		
					<div class="container">
  						<div class="row">			
							<div class="col col-lg-10">
								<?= $direccion->direccion ?>   
    						</div>
    						<div class="col col-lg-2">
								<?= $form->field($model, 'direccion')->radio(['label' => 'Selecionar', 'value' => $direccion->id]) ?>
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