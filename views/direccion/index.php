<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
$this->title = 'Direcciones registradas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="direccion-index">

    <div class="container top-buffer-null">


            <div class="row">
                <div class="jumbotron">
                    <h1 class="section-heading"><?= Html::encode($this->title) ?></h1>
                    <p>
                        En este seccion encontraras todas tu direcciones donde podras hacer llegar los servicios que contrates. Las direcciones son el paso inicial para empezar a recibir nuestros servicios
                    </p>
                    <p><?= Html::a('Crear direccion', ['create'], ['class' => 'btn btn-primary','style'=>'width:40%;']) ?></p>
                </div>
            </div>

        <?php 
        if (empty($direcciones)==false) { 
            ?>
            
            <h3 class="well text-center">
                Estas son las direcciones a donde tus servicios llegaran
            </h3>
            
            
            
            <div class="row text-center">

                <?php
                foreach($direcciones as $dir){
                    ?>
                    <div class="col-md-4">

                        <div class="media">
                          <div class="media-left">

                            <?php 
                            echo '<img class="img-thumbnail" src="https://maps.googleapis.com/maps/api/staticmap?center='.$dir->puntos_referencia.'&markers=color:green|label:S|'.$dir->puntos_referencia.'&zoom=18&size=550x270&maptype=roadmap&key=AIzaSyD5BJZw2s9kaHkVsAoODp5i1xkfet2-wsI">'
                            ?>

                        </div>

                    </div>


                    <h4 class="service-heading"><?=$dir->nombre?></h4>
                    <p class="text-muted">
                        <?=substr($dir->direccion, 0, 50)?>
                    </p>
                    <div class="row">
                        <div class="col-md-3 col-md-offset-3">
                            <a href=<?= Url::toRoute(['/direccion/view','id'=>$dir->id]);?> > <i class="fa yeti fa-search fa-2x"></i>
                                <div class="row yeti">Ver</div>
                            </a>

                        </div>
                        
                        <div class="col-md-3">
                            
                            <a href=<?= Url::toRoute(['/direccion/update','id'=>$dir->id]);?> > <i class="fa yeti fa-edit fa-2x"></i>
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
    }
    ?>    

</div>


</div>
