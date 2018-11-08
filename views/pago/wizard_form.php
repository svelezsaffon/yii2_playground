<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\bootstrap\Modal;
use yii\helpers\Url;

?>

<div class="pago-form">

<h3> Aqui podras realizar el pago de tus servicios o de planes</h3>

<?php 

$this->registerJs("$('i[title=\"nombre\"]').tooltip()"); 

$form = ActiveForm::begin(['options' => ['role' => 'form']]);   
$wizard_config = [
    'id' => 'stepwizard',
    'steps' => [
        1 => [
            'title' => 'Trabajo',
            'icon' => 'glyphicon glyphicon-check',
                'content' => Yii::$app->controller->renderPartial('selecciona_tu_metodo', ['model' => $model, 'form'=>$form]),                
            'skippable' => false,
            'buttons' => [
                'next' => [
                    'title' => 'Siguiente', 
                    'options' => [
                        'class' => 'btn btn-primary',
                        'id' =>'nextstep1',                        
                        'disabled'=>true,
                        'data-toggle'=>"tooltip",
                        'title'=>"debes seleccionar un servicio antes de seguir!",
                    ],
                 ],
             ],
        ],        

    ],
    'start_step' =>1,    
    
];


echo \drsdre\wizardwidget\WizardWidget::widget($wizard_config);

ActiveForm::end();

?>


</div>