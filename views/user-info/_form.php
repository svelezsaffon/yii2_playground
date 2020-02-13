<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>

<div class="row section-bg-grey ">   
    <div class="row">
        <div class="col-lg-12">
            <div class="media">
                <div class="media-body">
                    <img src="img/iconos/equipo-247-manizales.png" class="img-responsive center-block">
                </div>
            </div>            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="section-heading grey-text" style="color:grey;">Cuentanos un poco sobre ti </h3>
        </div>
    </div>     
</div>

<div class="user-info-form top-buffer">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        
        <div class="col-lg-6">
            
            <div class="row">
                <div class="col-lg-12">
                <?= $form->field($model, 'nombre')->textInput(['maxlength' => true])->hint("Ingresa tu nombre") ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                <?= $form->field($model, 'telefono_fijo')->textInput(['maxlength' => true])->hint("Ingresa tu telefono fijo, dond epodamos localizarte") ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                <?= $form->field($model, 'cedula')->textInput(['maxlength' => true])->hint("Ingresa tu cedula, esta solo sera utilizada para facturacion") ?>
                </div>
            </div>            

        </div>

        <div class="col-lg-6">

            <div class="row">
                <div class="col-lg-12">
                <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true])->hint("Ingresa tus apellidos") ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                <?= $form->field($model, 'celular')->textInput(['maxlength' => true])->hint("Ingresa tu telefono fijo, donde podamos localizarte") ?>
                </div>
            </div>
        
        </div>

    </div>

    <div class="form-group">
        <div class="row">
            <div>
                <div class="col-md-4 col-md-offset-5">
                    <?= Html::submitButton('Guardar', ['class' => 'btn btn-info']) ?>  
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>


