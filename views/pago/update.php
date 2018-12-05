<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pago */

$this->title = 'Update Pago: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pago-update">

    

    <?= $this->render('_form', [
        'model' => $model,'metodos'=>$metodos,
    ]) ?>

</div>
