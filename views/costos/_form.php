<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

?>



<section id="form_plane">

    <div class="plane-form">


<div class="row text-center">                    
    <h2></h2>
</div>


<?php

$form = ActiveForm::begin(['options' => ['role' => 'form']]);

$wizard_config = [
    'id' => 'stepwizard',
    'steps' => [
        1 => [
            'title' => 'Sericio a prestar',
            'icon' => 'glyphicon glyphicon-cog',
            'content' => Yii::$app->controller->renderPartial('seleccionar_servicio_step',['form'=>$form,'model'=>$model,'lista_servicios'=>$servicios]),
            'skippable' => false,
            'buttons' => [
                'next' => [
                    'title' => 'Siguiente', 
                    'options' => [
                        'class' => 'btn btn-primary',
                        'id' =>'nextstep1',
                        'disabled'=>true,
                        'data-toggle'=>"tooltip",                                                
                    ],
                 ],
             ],
        ],
        3 => [
            'title' => 'Ciudad de prestacion',
            'icon' => 'glyphicon glyphicon-time',            
            'content' => Yii::$app->controller->renderPartial('seleccionar_ciudad_step',['form'=>$form,'ciudades'=>$ciudades,'model'=>$model]),
            'skippable' => false,
            'buttons' => [
                'next' => [
                    'title' => 'Siguiente', 
                    'options' => [
                        'class' => 'btn btn-primary',
                        'id' =>'nextstep2',
                        'disabled'=>true,
                        'data-toggle'=>"tooltip",                                                
                    ],
                 ],
             ],
        ],         

        4 => [
            'title' => 'Horario de prestacion',
            'icon' => 'glyphicon glyphicon-time',            
            'content' => Yii::$app->controller->renderPartial('seleccionar_horario_seller',['form'=>$form,'model'=>$model,'lista_horarios'=>$horarios]),
            'skippable' => false,
            'buttons' => [
                'next' => [
                    'title' => 'Siguiente', 
                    'options' => [
                        'class' => 'btn btn-primary',
                        'id' =>'finalstepsave',
                        'disabled'=>true,
                        'data-toggle'=>"tooltip",                                                
                    ],
                 ],
             ],
        ],         
        5 => [
            'title' => 'Valor a cobrar',
            'icon' => 'glyphicon glyphicon-time',
            'content' => Yii::$app->controller->renderPartial('seleccionar_valor_seller',['form'=>$form,'model'=>$model]),
            'skippable' => false,
            'buttons' => [  
                    'save' => [
                    'html' => Html::submitButton(
                        Yii::t('app', 'Guardar'),
                        [
                            'class' => 'btn btn-primary',
                            'id' => 'finalstepsave',
                            'name' => 'step',
                            'value' => 'save-final',
                            'disabled'=>false,
                        ]
                    ),
                ],
                'prev' => [
                    'title' => 'Anterior', 
                    'options' => [
                        'class' => 'btn btn-primary',
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

</section>
