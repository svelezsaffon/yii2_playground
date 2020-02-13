<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AplicacionTrabajos */

$this->title = 'Update Aplicacion Trabajos: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Aplicacion Trabajos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aplicacion-trabajos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
