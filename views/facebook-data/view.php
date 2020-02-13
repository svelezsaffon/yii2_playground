<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\FacebookData */

$this->title = $model->user;
$this->params['breadcrumbs'][] = ['label' => 'Facebook Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facebook-data-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->user], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->user], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user',
            'first_name',
            'lasta_name',
            'email:email',
        ],
    ]) ?>

</div>
