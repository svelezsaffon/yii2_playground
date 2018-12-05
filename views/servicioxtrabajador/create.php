<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Servicioxtrabajador */

$this->title = 'Create Servicioxtrabajador';
$this->params['breadcrumbs'][] = ['label' => 'Servicioxtrabajadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicioxtrabajador-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
