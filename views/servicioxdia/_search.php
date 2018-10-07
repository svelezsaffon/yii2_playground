<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServicioxdiaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servicioxdia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user') ?>

    <?= $form->field($model, 'direccion') ?>

    <?= $form->field($model, 'servicio') ?>

    <?= $form->field($model, 'trabajador') ?>

    <?php // echo $form->field($model, 'tiempo') ?>

    <?php // echo $form->field($model, 'fecha_inicia') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
