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
                        <h2>Para configurar un servicio, debes tener primero una direccion a donde se va a realizar tu servicio</h2>
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

/*
Podemos poner u boton ue pregunte, quieres escoger tu el empleado que te atendera o quieres que nosotros lo escojamos por ti?

Ahi tenemos un action(Boton) que trigue un requets de javascript al endpoint de los trabajadores!

Podemos hacer el action con un javascript bien simple

*/

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
            'buttons' => [  
                    'save' => [
                    'html' => Html::submitButton(
                        Yii::t('app', 'Guardar'),
                        [
                            'class' => 'btn btn-primary',
                            'id' => 'finalstepsave',
                            'name' => 'step',
                            'value' => 'save-final',

                        ]
                    ),
                ],               
             ],
        ],

    ],
    'start_step' => isset($step)?$step:1,
    
];
echo \drsdre\wizardwidget\WizardWidget::widget($wizard_config);
ActiveForm::end();
}

?>


</div>