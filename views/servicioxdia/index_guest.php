<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Servicio por dias';
$this->params['breadcrumbs'][] = $this->title;
$events = array();
?>
<div class="servicioxdia-index">

    <div class="container top-buffer-null">

        <div class="row">
            <div class="jumbotron">
                <h1 class="section-heading"><?= Html::encode($this->title) ?></h1>
                <p>En esta seccion encontraras el listado de los servicios que has contratado por dias y podras ver el calendario en que estos fueron programados</p>
                <p><?= Html::a('Crear nuevo servicio por dia', ['create'], ['class' => 'btn btn-primary','style'=>'width:40%;']) ?></p>
            </div>

        </div>



        <?php if (empty($servicios)==false) { ?>

            <h3 class="well text-center">
                Estos son los servicios por dia que tienes activos
            </h3>

            <div class="row text-center">
                <?php 

                $counter=0;
                foreach($servicios as $servicio){
                    
                    $Event = new \yii2fullcalendar\models\Event();
                    $Event->id = $counter;
                    $Event->title = $servicio['servicio']." - ".$servicio['direccion'];
                    $Event->start = $servicio['fecha'].'T08:00:00';  
                    $events[] = $Event;

                    ?>                   
                    <div class="col-md-4 top-buffer">

                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle yeti fa-stack-2x text-primary"></i>                            
                            <?php echo '<i class="fa '.$servicio['icon'].' fa-stack-1x fa-inverse "></i>'?>

                        </span>
                        <h5 class="service-heading"><?=$servicio['servicio']?></h5>
                        <h5 class="service-heading"><?=$servicio['fecha']?></h5>
                        <h5 class="service-heading"><?=$servicio['direccion']?></h5>
                        <p class="text-muted">

                        </p>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-3">
                                <a href=<?= Url::toRoute(['/servicioxdia/view','id'=> $servicio['id']])?> > <i class="fa yeti fa-search fa-2x"></i>
                                    <div class="row yeti">Ver</div>
                                </a>
                                
                            </div>
                            <div class="col-md-3">
                                <?php if($servicio['verificado']){?>
                                    <a href=<?= Url::toRoute(['/servicioxdia/update','id'=>$servicio['id']])?> > <i class="fa yeti fa-edit fa-2x"></i>
                                        <div class="row yeti">Editar</div>
                                    </a>
                                <?php }else{ ?>
                                    <a href=<?= Url::toRoute(['/pago/update','id'=>$servicio['id']])?> > <i class="fas fa-dollar-sign fa-2x red-yeti"></i>
                                        <div class="row red-yeti">Pagar</div>
                                    </a>
                                <?php } ?>

                            </div>
                        </div>
                        
                    </div>           

                    <?php } ?>
                    <?php } ?>
            </div>


            <?php if (empty($events)==false){ ?>

            
            <div class="row text-center">

                <h3 class="well text-center">
                    Asi se ve tu calendario de servicios
                </h3>

                
                    <?php                
                        echo \yii2fullcalendar\yii2fullcalendar::widget(array(
                        'events'=> $events,));                
                    ?>  
                
            </div>
            
        <?php } ?>

    </div>
</div>