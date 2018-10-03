<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PlaneSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plane-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'servicio') ?>

    <?= $form->field($model, 'user') ?>

    <?= $form->field($model, 'trabajador') ?>

    <?= $form->field($model, 'semanal') ?>

    <?php // echo $form->field($model, 'fecha_inicia') ?>

    <?php // echo $form->field($model, 'fecha_creacion') ?>

    <?php // echo $form->field($model, 'lunes') ?>

    <?php // echo $form->field($model, 'martes') ?>

    <?php // echo $form->field($model, 'miercoles') ?>

    <?php // echo $form->field($model, 'jueves') ?>

    <?php // echo $form->field($model, 'viernes') ?>

    <?php // echo $form->field($model, 'sabado') ?>

    <?php // echo $form->field($model, 'domingo') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
