<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Prueba */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prueba-form">

<?php 



$form = ActiveForm::begin(['options' => ['role' => 'form']]);     


$wizard_config = [
    'id' => 'stepwizard',
    'steps' => [
        1 => [
            'title' => 'Trabajo',
            'icon' => 'glyphicon glyphicon-refresh',
                'content' => $form->field($model, 'name')->textInput(['maxlength' => true]),                
            'skippable' => false,
            'buttons' => [
                'next' => [
                    'title' => 'Siguiente', 
                    'options' => [
                        'class' => 'btn btn-primary'
                    ],
                 ],
             ],
        ],
        2 => [
            'title' => 'Recurencia',
            'icon' => 'glyphicon glyphicon-calendar',
            'content' =>   $form->field($model, 'age')->textInput(),
            'skippable' => false,
            'buttons' => [
                'next' => [
                    'title' => 'Siguiente', 
                    'options' => [
                        'class' => 'btn btn-primary'
                    ],
                 ],
             ],
        ],
        3 => [
            'title' => 'Direccion',
            'icon' => 'glyphicon glyphicon-transfer',
            'content' =>   Html::submitButton('Save', ['class' => 'btn btn-success']),
            'skippable' => false,
            'buttons' => [
                'save' => Html::submitButton('Save', ['class' => 'btn btn-success']),
             ],
        ],
    ],
    
];


echo \drsdre\wizardwidget\WizardWidget::widget($wizard_config);

ActiveForm::end();
?>


   

</div>
