<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ranking */

$this->title = 'Create Ranking';
$this->params['breadcrumbs'][] = ['label' => 'Rankings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ranking-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
