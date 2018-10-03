<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Plane */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plane-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'servicio')->textInput() ?>

    <?= $form->field($model, 'user')->textInput() ?>

    <?= $form->field($model, 'trabajador')->textInput() ?>

    <?= $form->field($model, 'semanal')->textInput() ?>

    <?= $form->field($model, 'fecha_inicia')->textInput() ?>

    <?= $form->field($model, 'fecha_creacion')->textInput() ?>

    <?= $form->field($model, 'lunes')->checkbox()?>

    <?= $form->field($model, 'martes')->textInput() ?>

    <?= $form->field($model, 'miercoles')->textInput() ?>

    <?= $form->field($model, 'jueves')->textInput() ?>

    <?= $form->field($model, 'viernes')->textInput() ?>

    <?= $form->field($model, 'sabado')->textInput() ?>

    <?= $form->field($model, 'domingo')->textInput() ?>    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
