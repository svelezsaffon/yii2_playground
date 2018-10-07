<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ServicioxdiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Servicioxdias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicioxdia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Servicioxdia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user',
            'direccion',
            'servicio',
            'trabajador',
            //'tiempo',
            //'fecha_inicia',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
