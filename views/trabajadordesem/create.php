<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Trabajadordesem */

$this->title = 'Asignar servicios a trabajadores';
$this->params['breadcrumbs'][] = ['label' => 'Trabajadordesems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trabajadordesem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
