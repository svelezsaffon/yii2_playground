<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ServiciosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Servicios contratados por dia';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicioxdia-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Servicios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showOnEmpty'=>false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [  
                'label'=>'Trabajador',
                'format' => 'raw',
                'value'=>function ($data) {
                    return Html::a($data['nombre'],['trabajador/view', 'id' => $data['trabajador_num']]);                    
                },
            ],
            [  
                'label'=>'Servicio id',
                'format' => 'raw',
                'value'=>function ($data) {
                    return Html::a($data['servicio_num'],['servicioxdia/view', 'id' => $data['servicio_num']]);                    
                },
            ],
            [  
                'label'=>'Monto',
                'format' => 'raw',
                'value'=>function ($data) {
                    return Html::a($data['usuario_nombre']." ".$data['usuario_apellido'],['user-info/view', 'id' => $data['user_num']]);                    
                },
            ],




            'fecha_inicia',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
