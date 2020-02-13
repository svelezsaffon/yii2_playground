<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Horarioxservicio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="horarioxservicio-form">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_servicio')->dropDownList($servicios) ?>

    <?= $form->field($model, 'id_horario')->dropDownList($horarios) ?>
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
