<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AplicacionTrabajos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aplicacion-trabajos-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true])?>               
        </div>
        
        <div class="col-md-6">
            <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>        
        </div>

    </div>



    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => 6]) ?>
               
        </div>
        
        <div class="col-md-6">
                <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>
        </div>

    </div>

    <?= $form->field($model, 'info')->label('Cuentanos un poco sobre ti')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Enviar informacion', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
