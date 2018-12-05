<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Servicioxtrabajador */

$this->title = $model->servicio;
$this->params['breadcrumbs'][] = ['label' => 'Servicioxtrabajadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicioxtrabajador-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'servicio' => $model->servicio, 'trabajador' => $model->trabajador, 'tipo' => $model->tipo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'servicio' => $model->servicio, 'trabajador' => $model->trabajador, 'tipo' => $model->tipo], [
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
            'servicio',
            'trabajador',
            'tipo',
        ],
    ]) ?>

</div>
