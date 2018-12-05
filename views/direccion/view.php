<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Direccion */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Direccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="direccion-view">


    <div class="container top-buffer-null">

        <div class="row">
            <div class="jumbotron">
                <h1 class="section-heading"><?= Html::encode($this->title) ?></h1>
                <p>Aqui puedes ver la informacion de tu direccion llamada <?=$model->nombre?></p>
                <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>        
            </div>

        </div>

        <div class="row">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [                        
                'direccion:ntext',
                'nombre',            
                'quien_recibe:ntext',
                ],
            ]) ?>
        </div>
        <div class="row text-center">
            <?php 
                echo '<img class="img-thumbnail" src="https://maps.googleapis.com/maps/api/staticmap?center='.$model->puntos_referencia.'&markers=color:green|label:S|'.$model->puntos_referencia.'&zoom=18&size=700x350&maptype=roadmap&key=AIzaSyD5BJZw2s9kaHkVsAoODp5i1xkfet2-wsI">'
            ?>

        </div>

        </div>
    </div>
