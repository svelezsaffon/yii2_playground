<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Servicioxdia */

$this->title = 'Selecciona un trabajador que hara tu servicio';

$this->params['breadcrumbs'][] = ['label' => 'Servicioxdias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="servicioxdia-update">

<div class="jumbotron">
    <div class="page-header">
      <h2><?= Html::encode($this->title) ?> </h2>
      <h3><font color="grey">Hemos seleccionado los trabajadores que mejor pueden ayudarte</font></h3>
    </div>
</div>    

    <?= $this->render('_form_tra', [
          'model' => $model, 'trabajadorModel'=>$trabajadorModel
    ]) ?>


</div>
