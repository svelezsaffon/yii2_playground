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

.section-bg-grey{
      background: #F8F8FF;
} 

img.resize-90 {
  max-width:99.9%;
}

</style>
  <div class="section-bg-grey border-top-medium">
<div id="myCarousel" class="carousel m" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="img/servicios/banner-domestico.png" alt="Los Angeles">
    </div>

    <div class="item">
      <img src="img/servicios/banner-domestico.png" alt="Los Angeles">
    </div>

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>    

  

    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="section-heading"> <p class="grey-text" style="color:grey;">Conoce aquí</p> </h3>
            <h2 class="section-subheading"> <p class="grey-text" style="color:grey;">¡Nuestros servicios destacados!</p></h2>
        </div>
    </div>
    <div class="section-bg-grey border-top-medium">
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
                            <button type="button" class="center-block btn btn-info">Ver mas</button>
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
                                <p class="border-top-xx-small">Pintura</p>
                                <p class="small-text">Unica vez o mensual</p>
                                    
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" class="center-block btn btn-info">Ver mas</button>
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
                                <p class="border-top-xx-small">Pintura</p>
                                <p class="small-text">Unica vez o mensual</p>
                                    
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" class="center-block btn btn-info">Ver mas</button>
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
                                <p class="border-top-xx-small">Pintura</p>
                                <p class="small-text">Unica vez o mensual</p>
                                    
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" class="center-block btn btn-info">Ver mas</button>
                        </div>
                    </div>                
                </div>
            </div>
        </div>                

        </div>
    </div>
    </div>

<div class="border-top-medium">
    <div class="row">
        <div class="col-lg-4 ">
                    <div class="media">
                        <div class="media-body">
                            <img src="img/promos/oferta1.png" class="media-object">
                        </div>
                    </div>             
        </div>
        <div class="col-lg-4">
                    <div class="media">
                        <div class="media-body">
                            <img src="img/promos/oferta2.png" class="media-object">
                        </div>
                    </div>             
        </div>
        <div class="col-lg-4">
                    <div class="media">
                        <div class="media-body">
                            <img src="img/promos/oferta3.png" class="media-object">
                        </div>
                    </div>             
        </div>                
    </div>

</div>

<div class="border-top-medium">
<div class="section-bg-grey">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h4 class="grey-text" style="color:grey;">Contratar con nosotros es</h4>
        </div>
    </div>
    <div class="row border-top-medium">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                <div class="col-md-3">
                    <div class="media">
                        <div class="media-body text-center">
                            <h6 class="media-heading grey-text">Seguro</h6>
                            <img src="img/iconos/seguro.png" class="media-object center-block">
                        </div>
                    </div>                    
                </div>
                <div class="col-md-3">
                    <div class="media">
                        <div class="media-body text-center">
                            <h6 class="media-heading grey-text">Facil</h6>
                            <img src="img/iconos/facil.png" class="media-object center-block">
                        </div>
                    </div>                    
                </div>
                <div class="col-md-3">
                    <div class="media">
                        <div class="media-body text-center">
                            <h6 class="media-heading grey-text">Rapido</h6>
                            <img src="img/iconos/rapido.png" class="media-object center-block">
                        </div>
                    </div>                    
                </div>
                <div class="col-md-3">
                    <div class="media">
                        <div class="media-body text-center">
                            <h6 class="media-heading grey-text">Legal</h6>
                            <img src="img/iconos/legal.png" class="media-object center-block">
                        </div>
                    </div>                    
                </div>
                </div>                                                
            </div>
        </div>
    </div>
    <div class="border-top-medium">
    <div class="row border-top-medium">
        <div class="col-lg-3 col-lg-offset-2">
            <div class="alert alert-info">
                <h3 class="panel-title">Persona Profesional</h3>
                <div class="panel-body">
                    Puedes contratar gente profesional por días, para que te ayuden con tus diligencias diarias
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="alert alert-warning">
                <h3 class="panel-title">Tiempo Necesario</h3>
                <div class="panel-body">
                    Contratas una persona, por el tiempo estrictamente necesario y ajustado a tu presupuesto
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="alert alert-info">
                <h3 class="panel-title">Paga en linea</h3>
                <div class="panel-body">
                    Puedes pagar electrónicamente tu servicio, de manera que no habrá manejo de efectivo
                </div>
            </div>
        </div>                
    </div>
    </div>
</div>
</div>



<div class="row">

    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="section-heading"> <p class="grey-text" style="color:grey;">Aquí te explicamos como puedes contratar con nosotros</p> </h3>
            <h1 class="section-subheading"> <p class="grey-text" style="color:grey;">¿Comó Funciona?</p></h1>
        </div>
    </div>

    <div class="col-lg-6 text-center">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/15jClMArRK0?rel=0" allowfullscreen>                    
            </iframe>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="list-group">
            <a class="list-group-item">
                <h5 class="list-group-item-heading">Registrate en la comunidad</h5>
                <p class="list-group-item-text">Lo primero que tienes que hacer es registrarte en la pagina. Esto significa que debes crear un usuario y una contraseña, así puedes volver a ingresar para usar u ofrecer servicios</p>
            </a>
            <a class="list-group-item">
                <h5 class="list-group-item-heading">Día o Plan</h5>
                <p class="list-group-item-text">Puedes escoger si sólo necesitas tu servicio un día especifico, o puedes seleccionar que el servicio sea repetitivo.</p>
            </a>
            <a class="list-group-item">
                <h6 class="list-group-item-heading">¿Qué tipo de servicio necesitas u ofreces?</h5>
                <p class="list-group-item-text">Ofrecemos gran variedad de servicios que te pueden ayudar con tu día a día, o cuando ofreces servicios puedes encontrar clientes mas facil</p>
            </a>
            <a class="list-group-item">
                <h5 class="list-group-item-heading">Configuración</h5>
                <p class="list-group-item-text">La configuración del servicio es la parte mas importante, debes decirnos que día lo necesitas, en que dirección y puedes escoger de una gran lista de empleados quién realizara tu servicio</p>
            </a>
            <a class="list-group-item">
                <h5 class="list-group-item-heading">Pago</h5>
                <p class="list-group-item-text">Debes hacer el pago de tu servicio un día antes de que este llegue, si no recibimos tu pago el día antes, nos veremos obligados a cancelar tu servicio. Claro que te llamaremos y haremos todo lo posible por recordarte</p>
            </a>                                                
        </div>
    </div>
</div>


   




        <!-- jQuery -->
        <script src="vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="js/jqBootstrapValidation.js"></script>
        <script src="js/contact_me.js"></script>

        <!-- Theme JavaScript -->
        <script src="js/agency.min.js"></script>

