<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Horarioxservicio */

$this->title = 'Create Horarioxservicio';
$this->params['breadcrumbs'][] = ['label' => 'Horarioxservicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horarioxservicio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'horarios'=>$horarios,'servicios'=>$servicios
    ]) ?>

</div>
