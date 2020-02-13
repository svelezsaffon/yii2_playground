<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Horarioxservicio */

$this->title = 'Update Horarioxservicio: ' . $model->id_horario;
$this->params['breadcrumbs'][] = ['label' => 'Horarioxservicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_horario, 'url' => ['view', 'id_horario' => $model->id_horario, 'id_servicio' => $model->id_servicio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="horarioxservicio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
