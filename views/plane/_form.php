<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

?>

<div class="plane-form">
<?php 


$form = ActiveForm::begin(['options' => ['role' => 'form']]);     


$wizard_config = [
    'id' => 'stepwizard',
    'steps' => [
        1 => [
            'title' => 'Trabajo',
            'icon' => 'glyphicon glyphicon-refresh',
                'content' => Yii::$app->controller->renderPartial('step1', ['model' => $model, 'form'=>$form,'allServicios'=>$allServicios]),                
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
            'content' =>  Yii::$app->controller->renderPartial('step2', ['model' => $model, 'form'=>$form]),
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
            'icon' => 'glyphicon glyphicon-road',
            'content' => Yii::$app->controller->renderPartial('step3', ['model' => $model,'form'=>$form,'direcciones'=>$direccionesModel]),
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
        4 => [
            'title' => 'Trabajador',
            'icon' => 'glyphicon glyphicon-user',
            'content' =>  Yii::$app->controller->renderPartial('step4', ['model' => $model,'form'=>$form,'trabajadores'=>$trabajadorModel]),
            'buttons' => [  
                'next' => [
                    'title' => 'Siguiente', 
                    'options' => [
                        'class' => 'btn btn-primary'
                    ],
                 ],                

             ],
        ],
         5=> [
            'title' => 'Trabajador',
            'icon' => 'glyphicon glyphicon-ok',
            'content' =>Yii::$app->controller->renderPartial('final', ['model' => $model, 'form'=>$form])          
        ],

    ],
    'start_step' =>1,    
    
];


echo \drsdre\wizardwidget\WizardWidget::widget($wizard_config);

ActiveForm::end();
?>


</div>