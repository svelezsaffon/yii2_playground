<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserInfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-info-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'telefono_fijo') ?>

    <?= $form->field($model, 'cedula') ?>

    <?php // echo $form->field($model, 'celular') ?>

    <?php // echo $form->field($model, 'apellidos') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
