<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PagoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pagos';
$this->params['breadcrumbs'][] = $this->title;
?>

<script type="text/javascript">
    function verifyPago(id){
        SimpleLoading.start('gears');
    
        $.post("index.php?r=pago/verificar&id="+id,
              function( data ) {                  
                  alert("Pago "+id+" fue verificado correctamente");
                  SimpleLoading.stop(); 
                  location.reload();
              }
          ); 
    }
</script>

<div class="pago-index">

    <div class="row">   
        <h3 class="well text-center">Listado de pagos sin verificar de servicios por un solo dia</h3>
    </div> 

<!--' '-->

    <?= GridView::widget([
        'dataProvider' => $pagos,
        'filterModel' => $searchModel,
        'showOnEmpty'=>false,
        'columns' => [           
            [  
                'label'=>'Id Pago',
                'format' => 'raw',
                'value'=>function ($data) {
                    return Html::a($data['pagoid'],['pago/view', 'id' => $data['pagoid']]);                    
                }, 
            ],

            [  
                'label'=>'Usuario',
                'format' => 'raw',
                'value'=>function ($data) {
                    return Html::a($data['user_name']." ".$data['user_apellidos'],['user-info/view', 'id' => $data['user_id']]);                    
                }, 
            ],
            [  
                'label'=>'Servicio',
                'format' => 'raw',
                'value'=>function ($data) {
                    return Html::a($data['servicio_nombre'],['servicioxdia/view', 'id' => $data['servicioid']]);                    
                },
            ],
            [  
                'label'=>'Monto',
                'format' => 'raw',
                'value'=>function ($data) {
                    return Yii::$app->formatter->asCurrency($data['monto'], 'COP');                    
                },
            ],
            'fecha',
            [  
                'label'=>'Verificar',
                'format' => 'raw',
                'value'=>function ($data) {                    
                    return '<button type="button" onclick="verifyPago('.$data['pagoid'].')" class="btn btn-default btn-lg">
                                <i class="fas fa-check-circle">Verificar</i>
                            </button>';                   
                },
            ],


        ],
    ]); ?>

    <div class="row">   
        <h3 class="well text-center">Listado de pagos sin verificar de planes repetitivos</h3>
    </div>    

    <?= GridView::widget([
        'dataProvider' => $pagos_planes,
        'filterModel' => $searchModel,
        'showOnEmpty'=>false,
        'columns' => [           


            [  
                'label'=>'Servicio',
                'format' => 'raw',
                'value'=>function ($data) {
                    return Html::a($data['servicio_nombre'],['servicioxdia/view', 'id' => $data['servicioid']]);                    
                },
            ],

            [  
                'label'=>'Monto',
                'format' => 'raw',
                'value'=>function ($data) {
                    return Yii::$app->formatter->asCurrency($data['monto'], 'COP');                    
                },
            ],

            'fecha',

        ],
    ]); ?>     

     
</div>
