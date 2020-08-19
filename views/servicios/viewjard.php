<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ServiciosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Servicio de Jardineria';
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">

img.resize {
  max-width:85%;
  max-height:85%;
}


.row{
    overflow: hidden; 
}


[class*="col-"]{
    margin-bottom: -99999px;
    padding-bottom: 99999px;
}



.center{
    vertical-align:center
}

section.groove {border-style: groove;}

.small-text{
    font-size: xx-small;
}

.border-left{
padding-right:20px; 
border-right: 1px;
}

.cliente {
    margin-top:10px;
    border: #cdcdcd medium solid;
    border-radius: 10px;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
}

.border-top-xx-small{   /* within paragraph */
    margin-bottom: 0px;
}

.border-top-medium{   /* within paragraph */
    margin-bottom: 50px;
}

.section-bg-grey{
      background: #F8F8FF;
} 

</style>


<div class="servicios-index">

	<div class="section-bg-grey border-top-medium">

		<div id="myCarousel" class="carousel m" data-ride="carousel">
  
  			<div class="carousel-inner">
    			<div class="item active ">
      				<img src="img/servicios/jardineria/jardineria-servicios247-manizales.jpg" alt="Los Angeles">
    			</div>
  			</div>  		

		</div> 
	</div>

</div>

	<div class="section-bg-grey border-top-medium">

		<div class="row border-top-medium">

			<div class="col-md-offset-1 col-md-5">
				<img class="resize" src="img/servicios/jardineria/servicio-jardineria-manizales.png" alt="Los Angeles">
			</div>
			<div class="col-md-6">
				<h3 class="grey-text">
						Servicio de Jardineria
				</h3>
			</div>
		</div>			
	</div>
</div>

<div class="section-bg-grey border-top-medium">

    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="section-heading"> <p class="grey-text" style="color:grey;">Conoce aquí</p> </h3>
            <h2 class="section-subheading"> <p class="grey-text" style="color:grey;">¡Algunos de nuestros servicios!</p></h2>
        </div>
    </div>
    

    <div class="row">        
        <div class="col-md-2 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="media">
                                <div class="media-body">
                                    <img src="img/servicios/pintor.png" class="img-responsive center-block">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="grey-text section-subheading">
                                    
                                <p class="border-top-xx-small small-text">servicio de</p>
                                <p class="border-top-xx-small">Pintura</p>
                                <p class="small-text">Unica vez o mensual</p>
                                    
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?= Html::a('Ver mas', ['/servicios/viewpintura'], ['class'=>'center-block btn btn-info']) ?>
                        </div>
                    </div>                
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="media">
                                <div class="media-body">
                                    <img src="img/servicios/limpieza.png" class="img-responsive center-block">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="grey-text section-subheading">
                                    
                                <p class="border-top-xx-small small-text">servicio de</p>
                                <p class="border-top-xx-small">Servicio Domestico</p>
                                <p class="small-text">Unica vez o mensual</p>
                                    
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?= Html::a('Ver mas', ['/servicios/viewdome'], ['class'=>'center-block btn btn-info']) ?>
                        </div>
                    </div>                
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="media">
                                <div class="media-body">
                                    <img src="img/servicios/lava.png" class="img-responsive center-block">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="grey-text section-subheading">
                                    
                                <p class="border-top-xx-small small-text">servicio de</p>
                                <p class="border-top-xx-small">Lavado vehiculos</p>
                                <p class="small-text">Unica vez o mensual</p>
                                    
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?= Html::a('Ver mas', ['/servicios/viewvehi'], ['class'=>'center-block btn btn-info']) ?>
                        </div>
                    </div>                
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="media">
                                <div class="media-body">
                                    <img src="img/servicios/jardineria.png" class="img-responsive center-block">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="grey-text section-subheading">
                                    
                                <p class="border-top-xx-small small-text">servicio de</p>
                                <p class="border-top-xx-small">Jardineria</p>
                                <p class="small-text">Unica vez o mensual</p>
                                    
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?= Html::a('Ver mas', ['/servicios/viewjard'], ['class'=>'center-block btn btn-info']) ?>
                        </div>
                    </div>                
                </div>
            </div>
        </div>                

        </div>
</div>