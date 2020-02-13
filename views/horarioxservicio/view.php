<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Horarioxservicio */

$this->title = $model->id_horario;
$this->params['breadcrumbs'][] = ['label' => 'Horarioxservicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horarioxservicio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_horario' => $model->id_horario, 'id_servicio' => $model->id_servicio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_horario' => $model->id_horario, 'id_servicio' => $model->id_servicio], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_horario',
            'id_servicio',
        ],
    ]) ?>

</div>
