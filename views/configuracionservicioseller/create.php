<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Configuracionservicioseller */

$this->title = 'Create Configuracionservicioseller';
$this->params['breadcrumbs'][] = ['label' => 'Configuracionserviciosellers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="configuracionservicioseller-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'ciudades'=>$ciudades,'lista_servicios'=>$lista_servicios,'userinfo'=>$userinfo,'lista_horarios'=>$lista_horarios
    ]) ?>

</div>
