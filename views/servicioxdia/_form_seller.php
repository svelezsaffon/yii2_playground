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
    <h2>
      <?=Html::encode($userinfo->nombre)?>,
    </h2>
    
      <p id="inst_text">
        Configura el servicio que deseas prestar      
      </p>
    
</div>


<?php



$wizard_config = [
    'id' => 'stepwizard',
    'steps' => [
        1 => [
            'title' => 'Sericio a prestar',
            'icon' => 'glyphicon glyphicon-refresh',
            'content' => Yii::$app->controller->renderPartial('step1_seller', ['lista_servicios'=>$lista_servicios]),
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
    ],
    'start_step' => 1,    
];
echo \drsdre\wizardwidget\WizardWidget::widget($wizard_config);
?>



</div>

</section>
