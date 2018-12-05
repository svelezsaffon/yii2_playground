<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Servicios;
use app\models\Trabajador;
?>

<div class="trabajadordesem-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'trabajador')->dropDownList(ArrayHelper::map(Trabajador::find()->all(), 'id', 'nombre')) ?>   
    
    <?= $form->field($model, 'servicio')->dropDownList(ArrayHelper::map(Servicios::find()->all(), 'id', 'nombre')) ?>    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
