<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Plane */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plane-form">
<?php 



$form = ActiveForm::begin(['options' => ['role' => 'form']]);     
$step1=Yii::$app->controller->renderPartial('step1', ['model' => $model, 'form'=>$form,'allServicios'=>$allServicios]);
$step2=Yii::$app->controller->renderPartial('step2', ['model' => $model, 'form'=>$form]);
$step3=Yii::$app->controller->renderPartial('step3', ['model' => $model,'form'=>$form,'direcciones'=>$direccionesModel]);
$step4=Yii::$app->controller->renderPartial('step4', ['model' => $model,'form'=>$form,'trabajadores'=>$trabajadorModel]);

$wizard_config = [
    'id' => 'stepwizard',
    'steps' => [
        1 => [
            'title' => 'Trabajo',
            'icon' => 'glyphicon glyphicon-refresh',
                
                'complete_content'=>$step1,
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
            'content' =>  $step2,
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
            'content' => $step3,
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
            'content' => $step4,
            'buttons' => [
                'next' => [
                    'title' => 'Siguiente', 
                    'options' => [
                        'class' => 'btn btn-primary'
                    ],
                 ],
             ],
        ],
    ],
    'complete_content' =>  Yii::$app->controller->renderPartial('final', ['model' => $model, 'form'=>$form]), // Optional final screen    
];


echo \drsdre\wizardwidget\WizardWidget::widget($wizard_config);

ActiveForm::end();
?>


</div>