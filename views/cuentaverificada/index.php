<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CuentaverificadaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cuentaverificadas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuentaverificada-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cuentaverificada', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user',
            'fecha',
            'hash:ntext',
            'verificada',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
