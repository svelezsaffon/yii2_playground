<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TrabajadordesemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trabajos que prestan cada empleado';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trabajadordesem-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Asignar nuevo servicio a empleado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [  
                'label'=>'Trabajador',
                'format' => 'raw',
                'value'=>function ($data) {
                    return Html::a($data['trab_nombre']." ".$data['trab_apellido'] ,['trabajador/view', 'id' => $data['trab_id']]);                    
                },
            ],
            [  
                'label'=>'Servcicio que presta',
                'format' => 'raw',
                'value'=>function ($data) {
                    return Html::a($data['servicio_nombre'] ,['servicios/view', 'id' => $data['serv_id']]);                    
                },
            ],            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
