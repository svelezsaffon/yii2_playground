<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AplicacionTrabajos */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Aplicacion Trabajos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aplicacion-trabajos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
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
            'nombre',
            'apellidos',
            'info:ntext',
            'telefono:ntext',
            'email:email',
        ],
    ]) ?>

    <div class="alert alert-success" role="alert">

        Guarda este número en caso que necesitemos hacerle seguimiento
        <strong>
            <span class="badge"><?= $model->id ?></span>            
        </strong>

    </div>


</div>
