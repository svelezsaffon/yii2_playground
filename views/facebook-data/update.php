<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FacebookData */

$this->title = 'Update Facebook Data: ' . $model->user;
$this->params['breadcrumbs'][] = ['label' => 'Facebook Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user, 'url' => ['view', 'id' => $model->user]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="facebook-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
