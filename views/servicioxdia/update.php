<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Servicioxdia */

$this->title = 'Actualizar servicio por dia';
$this->params['breadcrumbs'][] = ['label' => 'Servicioxdias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="servicioxdia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
          'model' => $model, 'allServicios'=>$allServicios,'direccionesModel'=>$direccionesModel,'trabajadorModel'=>$trabajadorModel
    ]) ?>

</div>
