<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Servicioxtrabajador */

$this->title = 'Update Servicioxtrabajador: ' . $model->servicio;
$this->params['breadcrumbs'][] = ['label' => 'Servicioxtrabajadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->servicio, 'url' => ['view', 'servicio' => $model->servicio, 'trabajador' => $model->trabajador, 'tipo' => $model->tipo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="servicioxtrabajador-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
