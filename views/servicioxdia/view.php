<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Servicioxdia */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Servicioxdias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicioxdia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user',
            'direccion',
            'servicio',
            'trabajador',
            'tiempo',
            'fecha_inicia',
        ],
    ]) ?>


    <?= Html::a('¿Quieres Pagar este servicio de una vez?', ['/pago/creates','id'=>$model->id], ['class'=>'btn btn-primary']) ?>


</div>
