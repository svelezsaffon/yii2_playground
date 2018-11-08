<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Servicioxdia */

$this->title = 'Configurar servicio por dia';
$this->params['breadcrumbs'][] = ['label' => 'Servicioxdias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicioxdia-create">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'allServicios'=>$allServicios,'direccionesModel'=>$direccionesModel,'trabajadorModel'=>$trabajadorModel,'step'=>$step
    ]) ?>

</div>
