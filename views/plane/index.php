<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlaneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Planes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plane-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Plane', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'servicio',
            'user',
            'trabajador',
            'semanal',
            //'fecha_inicia',
            //'fecha_creacion',
            //'lunes',
            //'martes',
            //'miercoles',
            //'jueves',
            //'viernes',
            //'sabado',
            //'domingo',
            //'direccion',
            //'timepo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
