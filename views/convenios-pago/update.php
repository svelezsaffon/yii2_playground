<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ConveniosPago */

$this->title = 'Update Convenios Pago: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Convenios Pagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="convenios-pago-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
