<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
?>

<div class="plane-form">


<?php 

$form = ActiveForm::begin(['options' => ['role' => 'form']]);
$wizard_config = [
    'id' => 'stepwizard',
    'steps' => [
        1 => [
            'title' => 'Trabajador',
            'icon' => 'glyphicon glyphicon-user',
            'content' =>  Yii::$app->controller->renderPartial('step4', ['model' => $model,'form'=>$form,'trabajadores'=>$trabajadorModel]),
            'buttons' => [  
                    'save' => [
                    'html' => Html::submitButton(
                        Yii::t('app', 'Guardar'),
                        [
                            'class' => 'btn btn-primary',
                            'id' => 'finalstepsave',
                            'name' => 'step',
                            'disabled'=>true,
                            'value' => 'save-final',

                        ]
                    ),
                ],               

             ],
        ],        
    ],    
    
];
echo \drsdre\wizardwidget\WizardWidget::widget($wizard_config);
ActiveForm::end();

?>


</div>