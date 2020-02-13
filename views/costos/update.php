<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Costos */

$this->title = 'Update Costos: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Costos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="costos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
