<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Costos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="costos-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'ciudad')->dropDownList(ArrayHelper::map($ciudades,'id', 'nombre'))->hint(
              '<h5><font color="red">Estamos trabajando para añadir mas ciudades a nuestro servicio</font></h5>'
    ); ?>   

    <?= $form->field($model, 'servicio')->dropDownList(ArrayHelper::map($servicios,'id', 'nombre'))->hint(
              '<h5><font color="red">Estamos trabajando para añadir mas ciudades a nuestro servicio</font></h5>'
    ); ?>    

    <?= $form->field($model, 'horario')->dropDownList(ArrayHelper::map($horarios,'id', 'descripcion'))->hint(
              '<h5><font color="red">Estamos trabajando para añadir mas ciudades a nuestro servicio</font></h5>'
    ); ?>  

    <?= $form->field($model, 'valor')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
