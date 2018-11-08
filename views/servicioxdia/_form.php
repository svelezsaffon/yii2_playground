<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\bootstrap\Modal;
use yii\helpers\Url;
?>

<div class="plane-form">


<?php 

if(sizeof($direccionesModel) == 0){ 
            Modal::begin([
                    'header'=>'<h4>Crear Nueva Direccion</h4>',
                    'id'=>'modal',
                    'size'=>'modal-lg',
                ]);

                echo "<div id='modalContent'></div>";
            Modal::end();
            ?>
        <div class="jumbotron">
            <div class="alert alert-danger" role="alert">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Para configurar un servicio, debes tener primero una direccion a dodne se va a realizar tu servicio</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?=Html::button('Crear direccion', ['value'=>Url::to('index.php?r=direccion/createmodal&loc=10'),'class'=>' btn btn-danger', 'id'=>'modalButton'])?>
                    </div>                  
                </div>
            </div> 
        </div>
<?php

}else{


$this->registerJs("$('i[title=\"nombre\"]').tooltip()");

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
                        'class' => 'btn btn-primary',
                        'id' =>'nextstep1',
                        'disabled'=>true,
                        'data-toggle'=>"tooltip",
                        'title'=>"debes seleccionar un servicio antes de seguir!",
                    ],
                 ],
             ],
        ],
        2 => [
            'title' => 'Fecha y Horario',
            'icon' => 'glyphicon glyphicon-calendar',
            'content' =>  Yii::$app->controller->renderPartial('step2', ['model' => $model, 'form'=>$form]),
            'skippable' => false,
            'buttons' => [
                'next' => [
                    'title' => 'Siguiente', 
                    'options' => [
                        'class' => 'btn btn-primary',
                        'id' =>'nextstep2',
                        'disabled'=>true,
                        'data-toggle'=>"tooltip",
                        'title'=>"Debes especificar una fecha y el horario antes de seguir!",
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
                        'class' => 'btn btn-primary',
                        'id' =>'nextstep3',
                        'disabled'=>true,
                        'data-toggle'=>"tooltip",
                        'title'=>"Debes selecionar una direccion!",
                    ],
                 ],
             ],
        ],
        4 => [
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
    'start_step' => isset($step)?$step:1,//$step > 0 ?$step:1,    
    
];
echo \drsdre\wizardwidget\WizardWidget::widget($wizard_config);
ActiveForm::end();
}

?>


</div>