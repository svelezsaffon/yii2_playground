<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Servicioxtrabajador */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servicioxtrabajador-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'servicio')->textInput() ?>

    <?= $form->field($model, 'trabajador')->textInput() ?>

    <?= $form->field($model, 'tipo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
