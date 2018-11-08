<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ConveniosPago */

$this->title = 'Create Convenios Pago';
$this->params['breadcrumbs'][] = ['label' => 'Convenios Pagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="convenios-pago-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
