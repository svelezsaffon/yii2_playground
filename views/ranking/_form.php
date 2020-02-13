<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\rating\StarRating;
/* @var $this yii\web\View */
/* @var $model app\models\Ranking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ranking-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-mg-12 text-center">
    <?php
        echo $form->field($model, 'puntuacion')->widget(StarRating::classname(), [
        
    'pluginOptions' => [
        'min' => 0,
        'max' => 5,
        'step' => 1,
        'size' => 'lg',
        'starCaptions' => [
            0 => 'Extremadamente mal servicio',
            1 => 'Mal servicio',
            2 => 'Regular servicio',
            3 => 'Ok',
            4 => 'Bueno',
            5 => 'Muy bueno',            
        ],
        'starCaptionClasses' => [
            0 => 'text-danger',
            1 => 'text-danger',
            2 => 'text-warning',
            3 => 'text-info',
            4 => 'text-primary',
            5 => 'text-success',
            
        ],
    ],
        ]);
    ?>
    </div>
</div>

    <?= $form->field($model, 'comentario')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
