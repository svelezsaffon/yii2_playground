<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cuentaverificada */

$this->title = 'Update Cuentaverificada: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cuentaverificadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cuentaverificada-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
