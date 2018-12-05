<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Servicioxdia */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Servicioxdias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicioxdia-view">

  <div class="jumbotron">
    <div class="page-header">
      <h2><?= Html::encode($this->title) ?> </h2>
      <h3><font color="grey">Tu servicio se ve de la siguiente manera</font></h3>
    </div>
                <div class="row text-center">
                <div class="col-lg-6">


                    <?= Html::a('<i class="fas fa-edit"></i> Editar',['update', 'id' => $model->id], ['class' => 'btn btn-black yeti', 'title' => 'Sign Up']) ?>

                </div>                
                <div class="col-lg-6">
                            <?= Html::a('<i class="fas fa-eraser"></i> Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-black yeti',
            'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
            ],
            ]) ?>
                </div>
                
            </div>
  </div>
    <!-- About Section -->
     
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">

                        <li class="timeline-inverted">
                            <div class="timeline-image yeti">
                                <span class="fa-stack fa-5x">                                    
                                    <?='<i class="fa '.$model->icon.' fa-stack-1x fa-inverse"></i>' ?>
                                </span>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h2><?=$model->servicio?></h2>
                                    
                                </div>
                                <div class="timeline-body">
                                    <h3 class="text-muted"><?=$model->desc?></h3>
                                </div>
                            </div>
                        </li>


                        <li>
                            <div class="timeline-image">
                                <span class="fa-stack fa-5x">                                    
                                    <i class="fa fa-calendar-alt fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h2>Dia</h2>
                                    
                                </div>
                                <div class="timeline-body">
                                    <h3 class="text-muted"><?=$model->fecha_inicia?></h3>
                                </div>
                            </div>
                        </li>                        
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <span class="fa-stack fa-5x">                                    
                                    <i class="fa fa-hands-helping fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h2>Te atendera</h2>
                                    
                                </div>
                                <div class="timeline-body">
                                    <h3 class="text-muted"><?=$model->trabajador?></h3>
                                </div>
                            </div>
                        </li>                  
                    </ul>
                </div>
            </div>
        


    </div>
