<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;



/* @var $this yii\web\View */
/* @var $model app\models\Direccion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="direccion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'direccion')->textarea(['rows' => 6])->hint(
        '<h5><font color="red">Digita la direccion completa, utiliza todos los detalles posibles</font></h5>'
        ) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true])->hint(
      '<h5><font color="red">Dale un nombre que te ayude a reconocer esta direccion</font></h5>'
      ) ?>



            <?= $form->field($model, 'quien_recibe')->textarea(['rows' => 6])->hint(
              '<h5><font color="red">Que persona recibe en esta direccion, algo como "Mi tia Valentina"</font></h5>'
              ) ?>      

    <hr/>
    <h4> Puedes mostranos donde es tu direccion?</h4>
    <h6> Solo necesitamos que arrastres el icono rojo a donde quieres que sea el servicio</h6>
    <?php
    echo $form->field($model, 'puntos_referencia')->widget('\pigolab\locationpicker\CoordinatesPicker' , [
        'key' => 'AIzaSyD5BJZw2s9kaHkVsAoODp5i1xkfet2-wsI' ,   // require , Put your google map api key
        'valueTemplate' => '{latitude},{longitude}' , // Optional , this is default result format
        'options' => [
            'style' => 'width: 100%; height: 400px',  // map canvas width and height
            ] ,
        'enableSearchBox' => true , // Optional , default is true
        'searchBoxOptions' => [ // searchBox html attributes
            'style' => 'width: 300px;', // Optional , default width and height defined in css coordinates-picker.css
            ],
        'searchBoxPosition' => new JsExpression('google.maps.ControlPosition.TOP_LEFT'), // optional , default is TOP_LEFT
        'mapOptions' => [
            // google map options
            // visit https://developers.google.com/maps/documentation/javascript/controls for other options
            'mapTypeControl' => true, // Enable Map Type Control
            'mapTypeControlOptions' => [
            'style'    => new JsExpression('google.maps.MapTypeControlStyle.HORIZONTAL_BAR'),
            'position' => new JsExpression('google.maps.ControlPosition.TOP_LEFT'),
            ],
            'streetViewControl' => true, // Enable Street View Control
            ],
            'clientOptions' => [
            'location' => [
                'latitude'  => 5.058134619083599 ,
                'longitude' => -75.49235892788084,
            ],
            // jquery-location-picker options
            'radius'    => 300,
            'addressFormat' => 'street_number',
            ]
            ]);
            ?>







              <div class="form-group">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>






</div>

