<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>


<div class="plane-form">

    <?= $model->servicio; ?>

    <?= $model->user; ?>

    <?= $model->trabajador; ?>

    <?= $model->semanal; ?>

    <?= $model->fecha_inicia; ?>

    <?= $model->fecha_creacion; ?>

    <?= $model->lunes==true?"Lunes":"Not lunes";?>
    
    <?= $model->martes==true?"martes":"Not martes";?>
    
    <?= $model->miercoles==true?"miercoles":"Not miercoles";?>
    
    <?= $model->jueves==true?"jueves":"Not jueves";?>
    
    <?= $model->viernes==true?"viernes":"Not viernes";?>
    
    <?= $model->sabado==true?"sabado":"Not sabado";?>

    <?= $model->domingo==true?"domingo":"Not domingo";?>

    <?= Html::submitButton('Save', ['class' => 'btn btn-success'])?>
</div>