<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Costos */

$this->title = 'Create Costos';
$this->params['breadcrumbs'][] = ['label' => 'Costos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="costos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
			'ciudades'=>$ciudades,
            'horarios'=>$horarios,
            'servicios'=>$servicios,
    ]) ?>

</div>
