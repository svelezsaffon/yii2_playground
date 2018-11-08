<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use lo\widgets\modal\ModalAjax;
/* @var $this yii\web\View */
/* @var $model app\models\UserInfo */
/* @var $form yii\widgets\ActiveForm */
$this->registerJs("$('i[title=\"nombre\"]').tooltip()");


?>


<div class="user-info-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="row">
        <div class="col-lg-12">
            <div class="input-group">            
                <span class="input-group-addon" id="basic-addon1"><i class="fas fa-user"> Nombre</i></span>                                
                <?= $form->field($model, 'nombre')->textInput(['maxlength' => true])->label(false) ?>
                <span class="input-group-addon" id="basic-addon1"><i  title="Utilizaremos tu nombre solo para facturacion, ninguna informacion sera compartida" data-toggle="tooltip" class="fas fa-question"></i></span>
            </div>
        </div>
    </div>


    <div class="row top-buffer">
        <div class="col-lg-12">
            <div class="input-group">            
                <span class="input-group-addon" id="basic-addon1"><i class="fas fa-user-plus"> Apellidos</i></span>                
                <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true])->label(false) ?>
                <span class="input-group-addon" id="basic-addon1"><i  title="Utilizaremos tus apellidos solo para facturacion, ninguna informacion sera compartida" data-toggle="tooltip" class="fas fa-question"></i></span>
            </div>
        </div>
    </div>

    <div class="row top-buffer">
        <div class="col-lg-12">
            <div class="input-group">            
                <span class="input-group-addon" id="basic-addon1"><i class="fas fa-phone"> Tel Fijo</i></span>
                <?= $form->field($model, 'telefono_fijo')->textInput(['maxlength' => true])->label(false) ?>
                <span class="input-group-addon" id="basic-addon1"><i  title="Utilizaremos tu telefono fijo solo para facturacion, ninguna informacion sera compartida" data-toggle="tooltip" class="fas fa-question"></i></span>
            </div>
        </div>
    </div>

    <div class="row top-buffer">
        <div class="col-lg-12">
            <div class="input-group">            
                <span class="input-group-addon" id="basic-addon1"><i class="fas fa-mobile-alt"> Celular</i></span>
                <?= $form->field($model, 'celular')->textInput(['maxlength' => true])->label(false) ?>
                <span class="input-group-addon" id="basic-addon1"><i  title="Utilizaremos tu celular solo para facturacion, ninguna informacion sera compartida" data-toggle="tooltip" class="fas fa-question"></i></span>
            </div>
        </div>
    </div>

    <div class="row top-buffer">
        <div class="col-lg-12">
            <div class="input-group">            
                <span class="input-group-addon" id="basic-addon1"><i class="fas fa-address-card"> Cedula</i></span>
                <?= $form->field($model, 'cedula')->textInput(['maxlength' => true])->label(false) ?>
                <span class="input-group-addon" id="basic-addon1"><i  title="Utilizaremos tu cedula solo para facturacion, ninguna informacion sera compartida" data-toggle="tooltip" class="fas fa-question"></i></span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


