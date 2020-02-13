<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Direccion */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="direccion-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

          <div class="col-lg-6">
              <?= $form->field($model, 'direccion')->textInput(['maxlength' => true])->hint(
              '<h7><font color="red">Digita la direccion completa, utiliza todos los detalles posibles</font></h7>'
              ) ?>            
          </div>

          <div class="col-lg-6">

              <?= $form->field($model, 'ciudad')->dropDownList(ArrayHelper::map($direcciones,'id', 'nombre'))->hint(
              '<h7><font color="red">Estamos trabajando para añadir mas ciudades a nuestro servicio</font></h7>'
              ); ?>            
            
          </div>
      
    </div>

    <div class="row">
      
        <div class="col-lg-6">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true])->hint(
              '<h7><font color="red">Dale un nombre que te ayude a reconocer esta direccion</font></h7>'
            ) ?>          
        </div>

        <div class="col-lg-6">
            <?= $form->field($model, 'quien_recibe')->textInput(['maxlength' => true])->hint(
              '<h7><font color="red">Que persona recibe en esta direccion, ejemplo "Mi tia Valentina"</font></h7>'
              ) ?>                
        </div>

    </div>



    <div class="row">
      <div class="col-lg-12">
        <div class="form-group">
          <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        </div>
      </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
