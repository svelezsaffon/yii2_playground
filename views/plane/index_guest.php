<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
$this->title = 'Planes recurentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plane-index">
    <div class="container top-buffer-null">
        <div class="row">


            <div class="row">
                <div class="jumbotron">
                    <h1 class="section-heading"><?= Html::encode($this->title) ?></h1>
                    <p>En esta seccion podras ver todos los planes que tienes activos, recuerda que los planes son servicios recurentes</p>
                    <p><?= Html::a('Crear nuevo plan recurrente', ['create'], ['class' => 'btn btn-primary','style'=>'width:40%;']) ?></p>
                </div>
            </div>


        </div>
        <?php
        if (empty($planes)==false){
            ?>

            
            <h3 class="well text-center">Estos son los planes que tienes activos</h3>
            

            <div class="row text-center">

                <?php 

                foreach($planes as $dir){
                    ?>
                    <div class="col-md-4">

                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x yeti text-primary"></i>
                            <i class="fa fa-sync-alt fa-stack-1x fa-inverse"></i>
                        </span>

                        <h5 class="service-heading" ><?=$dir['fecha']?></h5>                                
                        <h5 class="service-heading"><?=$dir['nombre']?></h5>
                        <h5 class="service-heading"><?=$dir['dir_nombre']?></h5>
                        <p class="text-muted">

                        </p>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-3">
                                <a href=<?= Url::toRoute(['/plane/view','id'=> $dir['id'] ])?> > <i class="fa yeti fa-search fa-2x"></i>
                                    <div class="row yeti">Ver</div>
                                </a>

                            </div>
                            <div class="col-md-3">
                                <a href=<?= Url::toRoute(['/plane/update','id'=>$dir['id']])?> > <i class="fa yeti fa-edit fa-2x"></i>
                                    <div class="row yeti">Editar</div>
                                </a>

                            </div>
                        </div>

                    </div>

                    <?php                    
                }
                ?>
            </div>


            <?php
        }else{

        }
        ?>
        

        

    </div>

</div>
