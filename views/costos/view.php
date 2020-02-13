<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Costos */

$this->params['breadcrumbs'][] = ['label' => 'Costos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="costos-view">
  <div class="jumbotron">
    <div class="page-header">
      <h2><?= Html::encode($this->title) ?> </h2>
      <h3><font color="grey">Tu servicio se ve de la siguiente manera</font></h3>
    </div>
  </div>

<table class="table table-hover">
    <tr>
        <th>
            Ciudad
        </th>
        <th>
            Horario
        </th>
        <th>
            Valor a cobrar
        </th>
    </tr>  

    <tr>
        <td><?=$model['ciudad']?></td>
        <td><?=$model['horario']?></td>
        <td><?=Yii::$app->formatter->asCurrency($model['valor'], 'COP')?></td>
    <tr>
</table>

        <div class="row text-center">
                <div class="col-lg-6">
                    <?= Html::a('Borrar el servicio', ['delete', 'id' => $model['id']], [
                        'class' => 'btn btn-danger',
                        'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                        ],
                    ]) ?>
                </div>  
                <div class="col-lg-6">
                    <?= Html::a('Volver al Inicio', ['/'],[ 'class' => 'btn btn-success']) ?>
                </div>  

            </div>


</div>
