<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FacebookData */

$this->title = 'Create Facebook Data';
$this->params['breadcrumbs'][] = ['label' => 'Facebook Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facebook-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
