<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Notificaciones */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Notificaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notificaciones-view">

    <h3><?= Html::encode($this->title) ?></h3>
    <div class="alert alert-info" role="alert"><?=$model['texto']?></div>
    

    <div class="row text-center">

        <div class="col-md-1">
        
            <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
                ],
            ]) ?>   

        </div>

        <div class="col-md-1">
            <a href=<?=$model->link?> class="btn btn-info" role="button">Ver Accion</a>    
        </div>
    </div>

</div>
