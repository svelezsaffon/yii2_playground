<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Prueba */

$this->title = 'Update Prueba: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Pruebas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->age]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prueba-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
