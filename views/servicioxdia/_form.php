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
                        <h2>Para configurar un servicio, debes tener primero una dirección a donde se va a realizar tu servicio</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?=Html::button('Crear dirección', ['value'=>Url::to('index.php?r=direccion/createmodal&loc=10'),'class'=>' btn btn-danger', 'id'=>'modalButton'])?>
                    </div>                  
                </div>
            </div> 
        </div>
<?php

}else{

?>

<div class="row text-center">                    
    <h2>
      <?=Html::encode($userinfo->nombre)?>,
    </h2>
    
      <p id="inst_text">
          
      </p>
    
</div>


<?php

$this->registerJs("$('i[title=\"nombre\"]').tooltip()");

$form = ActiveForm::begin(['options' => ['role' => 'form']]);

$vars_step_2=['model' => $model, 'form'=>$form,'userinfo'=>$userinfo];


if(isset($horarios)){
    $vars_step_2["horarios"]=$horarios;
}

$wizard_config = [
    'id' => 'stepwizard',
    'steps' => [
        1 => [
            'title' => 'Trabajo',
            'icon' => 'glyphicon glyphicon-refresh',
            'content' => Yii::$app->controller->renderPartial('step1', ['model' => $model, 'form'=>$form,'allServicios'=>$allServicios,'userinfo'=>$userinfo,'costos'=> $costos]),
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
                        'onclick'=>"change_text('Selecciona una fecha y el horario en que necesitas tu servicio')",
                    ],
                 ],
             ],
        ],
        2 => [
            'title' => 'Fecha y Horario',
            'icon' => 'glyphicon glyphicon-calendar',
            'content' =>  Yii::$app->controller->renderPartial('step2', $vars_step_2),
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
                        'onclick'=>"change_text('Selecciona la direccion donde deseas el servicio')",
                    ],
                 ],
                'prev' => [
                    'title' => 'Anterior', 
                    'options' => [
                        'class' => 'btn btn-primary',
                    ],
                 ],                 
             ],
        ],
        3 => [
            'title' => 'Direccion',
            'icon' => 'glyphicon glyphicon-road',
            'content' => Yii::$app->controller->renderPartial('step3', ['model' => $model,'form'=>$form,'direcciones'=>$direccionesModel,'userinfo'=>$userinfo]),
            'buttons' => [  
                'next' => [
                    'title' => 'Siguiente', 
                    'options' => [
                        'class' => 'btn btn-primary',
                        'id' =>'nextstep3',
                        'disabled'=>true,
                        'data-toggle'=>"tooltip",
                        'title'=>"Debes especificar una fecha y el horario antes de seguir!",
                        'onclick'=>"change_text('Selecciona el empleado que mas te haga sentir comodo')",
                    ],
                 ],
                'prev' => [
                    'title' => 'Anterior', 
                    'options' => [
                        'class' => 'btn btn-primary',
                    ],
                 ],                
             ],
        ],
        4 => [
            'title' => 'Trabajador',
            'icon' => 'glyphicon glyphicon-user',
            'content' => Yii::$app->controller->renderPartial('step4', ['model' => $model,'form'=>$form,'userinfo'=>$userinfo]),
            'buttons' => [  
                    'save' => [
                    'html' => Html::submitButton(
                        Yii::t('app', 'Guardar'),
                        [
                            'class' => 'btn btn-primary',
                            'id' => 'finalstepsave',
                            'name' => 'step',
                            'value' => 'save-final',
                            'disabled'=>true,
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
    'start_step' => isset($step)?$step:1,
    
];
echo \drsdre\wizardwidget\WizardWidget::widget($wizard_config);
ActiveForm::end();
}

?>



</div>

</section>

<div class="row">
    <div class="col-md-3">
        <div class="well" id='text1q' ></div>
    </div>

    <div class="col-md-3">
        <div class="well" id='text2q' ></div>
    </div>

    <div class="col-md-3">
        <div class="well" id='text3q' ></div>
    </div>

    <div class="col-md-3">
        <div class="well" id='text4q' ></div>
    </div>        
    
</div>


<script type="text/javascript">
    function change_text(text){
        document.getElementById('inst_text').innerHTML= '<h4><strong class="yeti-text">'+text+'</strong><h4>'; 
    }
</script>
