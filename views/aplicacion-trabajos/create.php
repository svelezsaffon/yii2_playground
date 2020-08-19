    <?php 
use app\models\SignupForm;
use yii\helpers\Html;
?>

<!DOCTYPE html>

<script>
var words=['Rápido','Fácil','Legal','Seguro'];
var pos=0;

window.setInterval(() => {
    var text=document.getElementById('txt_advice');
    text.innerHTML=words[pos%words.length];
    pos++;
}, 1000);

</script>

<style type="text/css">
img.resize {
  max-width:50%;
  max-height:50%;
}

.panel-default > .panel-heading-custom {
background: #ff0000; color: #fff; }


.row{
    overflow: hidden; 
}
.well_bg {
    background: rgb(22, 105, 173);
}

[class*="col-"]{
    margin-bottom: -99999px;
    padding-bottom: 99999px;
}

@media (min-width: 992px) {
   .equal{  
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
    }
}

.panel {
    width: 100%;
    height: 100%;
}


.fixed-panel {  
  height: 30vh; 
}

.container-full {
  margin: 0 auto;
  width: 100%;
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

.border-top-big{   /* within paragraph */
    margin-bottom: 80px;
}

.section-bg-grey{
      background: #F8F8FF;
} 

.section-bg-red{
  background: #FF0000;	
}

img.resize-90 {
  max-width:99.9%;
}

</style>
<div class="border-top-medium">
	<div id="myCarousel" class="carousel m" data-ride="carousel">
  
  		<ol class="carousel-indicators">
    		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
  		</ol>

  		<div class="carousel-inner">   
    		<div class="item active">    			
    			<img src="img/servicios/trabaja-con-nosotros-servicio-247.jpg" alt="Los Angeles">
    		</div>
  		</div>  
	</div>     
</div>

<div class="border-top-medium">
	<div class="section-bg-grey">
<div class="row">

    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="section-heading"> <p class="grey-text" style="color:grey;">Aqui te explicamos como puedes trabajar con nosotros</p> </h3>
            <h1 class="section-subheading"> <p class="grey-text" style="color:grey;">¿Comó Funciona?</p></h1>
        </div>
    </div>

    <div class="col-lg-6 text-center">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/15jClMArRK0?rel=0" allowfullscreen></iframe>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="list-group">
            <a class="list-group-item">
                <h5 class="list-group-item-heading">Registrate en la comunidad</h5>
                <p class="list-group-item-text">Lo primero que tienes que hacer es registrarte en la pagina. Esto significa que debes crear un usuario y una contraseña, así puedes volver a ingresar para usar u ofrecer servicios. Debes registrate como prestador de servicios!</p>
            </a>
            <a class="list-group-item">
                <h5 class="list-group-item-heading">Configura el servicio</h5>
                <p class="list-group-item-text">Debes configurar muy bien tu servicio, que tipo de servicios prestas; que dia lo prestas, en que horario y cuanto cobras por el!</p>
            </a>
            <a class="list-group-item">
                <h5 class="list-group-item-heading">Estar pendiente si alguine te contrata!</h5>
                <p class="list-group-item-text">Vas a recibir notificaciones si tus servicios son requeridos por usuarios que lo necesite. Apenas recibas una notificacion, debes decidir si aceptarlo o rechazarlo</p>
            </a>
        </div>
    </div>
</div>
</div>
</div>



<div class="border-top-medium">

    	<div class="row">
        	<div class="col-lg-12 text-center">
            	<h3 class="section-heading"> <p class="grey-text" style="color:grey;">Beneficios al ser</p> </h3>
            	<h1 class="section-subheading"> <p class="grey-text" style="color:grey;">Parte de nuestra comunidad</p></h1>
        	</div>
    	</div>
    		<div class="row">
    			<div class="col-lg-2 col-lg-offset-2 section-bg-red">
    				<div class="well well-sm">
    					<div class="row">
    						<div class="col-lg-12">
								<div class="media">
                                	<div class="media-body">
                                    	<img src="img/iconos/tiempo-trabaja-con-nosotros.png" class="img-responsive center-block">
                                	</div>
                            	</div>
    						</div>
    					</div>
    				</div>
    			</div>    			
				<div class="col-lg-2 col-lg-offset-1">
    				<div class="well well-sm">
    					
    				</div>
    			</div>
    			<div class="col-lg-2 col-lg-offset-1">
    				<div class="well well-sm">
    					
    				</div>
    			</div>
    		</div>
    	
</div>






   




        
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>
<script src="js/agency.min.js"></script>

