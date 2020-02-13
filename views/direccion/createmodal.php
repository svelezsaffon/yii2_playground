<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Direccion */

$this->title = 'Crear nueva direccion';
$this->params['breadcrumbs'][] = ['label' => 'Direccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="direccion-create">

    <?= $this->render('_formmodal', [
        'model' => $model,
        'direcciones'=>$direcciones
    ]) ?>

</div>
