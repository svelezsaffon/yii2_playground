<?php

use yii\helpers\Html;
use dosamigos\datepicker\DatePicker;
?>

<h2> ¿Que dia quieres comenzar tu plan?</h2>


<?= $form->field($model, 'fecha_inicia')->widget(
                            DatePicker::className(), [
                        'inline' => true,          
                        'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                        'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-m-dd'
                        ]
                        ]);
?>




<h2> Selecciona la recurrencia del servicio</h2>

<table class="table">
  
  <tbody>
    <tr>
      <th scope="row">      
       <?= $form->field($model, 'semanal')->dropDownList([true => 'Semanal', false => 'Quincenal'] )->label(false)?>
      </th>              
    </tr>
    
  </tbody>
</table>

<h2>Selecciona que dias necesitas el servicio en la semana</h2>    
<table class="table">
  <thead class="thead-dark">
    
  </thead>
  <tbody>
    <tr>
      <th scope="col"><?= $form->field($model, 'lunes')->radio(['label' => 'Lunes', 'value' => 1, 'uncheck' => false])?></th>
      <th scope="col"><?= $form->field($model, 'martes')->radio(['label' => 'Martes', 'value' => 1, 'uncheck' => false])?></th>
      <th scope="col"><?= $form->field($model, 'miercoles')->radio(['label' => 'Miercoles', 'value' => 1, 'uncheck' => false])?></th>
      <th scope="col"><?= $form->field($model, 'jueves')->radio(['label' => 'Jueves', 'value' => 1, 'uncheck' => false])?></th>
      <th scope="col"><?= $form->field($model, 'viernes')->radio(['label' => 'Viernes', 'value' => 1, 'uncheck' => false])?></th>
      <th scope="col"><?= $form->field($model, 'sabado')->radio(['label' => 'Sabado', 'value' => 1, 'uncheck' => false])?></th>
      <th scope="col"><?= $form->field($model, 'domingo')->radio(['label' => 'Domingo', 'value' => 1, 'uncheck' => false])?></th>
    </tr>
    
  </tbody>
</table>

