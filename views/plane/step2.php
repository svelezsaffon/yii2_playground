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
            'format' => 'dd-M-yyyy'
        ]
]);?>

<h2> Selecciona la recurrencia del servicio</h2>

<table class="table">
  
  <tbody>
    <tr>
      <th scope="row">      
        <?= $form->field($model, 'semanal')->radio(['label' => 'Semanal', 'value' => true, ]) ?>
      </th>      
        <th scope="row">
        <?= $form->field($model, 'semanal')->radio(['label' => 'Quincenal', 'value' => false, ]) ?>
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
      <th scope="col"><?= $form->field($model, 'lunes')->checkbox()?></th>
      <th scope="col"><?= $form->field($model, 'martes')->checkbox() ?></th>
      <th scope="col"><?= $form->field($model, 'miercoles')->checkbox() ?></th>
      <th scope="col"><?= $form->field($model, 'jueves')->checkbox() ?></th>
      <th scope="col"><?= $form->field($model, 'viernes')->checkbox() ?></th>
      <th scope="col"><?= $form->field($model, 'sabado')->checkbox() ?></th>
      <th scope="col"><?= $form->field($model, 'domingo')->checkbox() ?></th>
    </tr>
    
  </tbody>
</table>

