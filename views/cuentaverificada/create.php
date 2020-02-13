<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cuentaverificada */

$this->title = 'Create Cuentaverificada';
$this->params['breadcrumbs'][] = ['label' => 'Cuentaverificadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuentaverificada-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
