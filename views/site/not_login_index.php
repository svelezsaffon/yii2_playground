<?php 
use app\models\SignupForm;
?>

<!DOCTYPE html>



<html lang="en">


<body id="page-top" class="index">

    <!-- Navigation -->


    <!-- Header -->

    <section id="register">
        <div class="container">   
        <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Servicios</h2>
                    <h3 class="section-subheading text-muted">
                        Estos son los servicios que tenemos a dispocion (Estamos trabajando para añadir mas!)
                    </h3>
                </div>
            </div>         

            <div class="row">

                <div class="col-lg-7 text-left">
                    <!--<img class="img-responsive text-left" src="img/logo.jpg" alt="">-->
                    <br/>
                    <div class="row">

                        <div class="col-lg-12">

                            <div class="row">
                                <div class="col-md-1">                            

                                    <span class="fa-stack fa-2x" >        
                                        <i class="fa fa-circle yeti fa-stack-2x text-primary"></i>        
                                        <i class="fa fa-gavel fa-stack-1x fa-inverse"></i>        
                                    </span>
                                </div>
                                <div class="col-md-11">
                                    <h4>
                                        Ud está contratando un servicio con una persona que cumple con todos los requisitos legales de la legislación Colombiana.
                                    </h4>
                                </div>
                            </div>

                        </div>                        
                    </div>
                    <br/>

                    <div class="row">

                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-1">                            

                                    <span class="fa-stack fa-2x" >        
                                        <i class="fa fa-circle yeti fa-stack-2x text-primary"></i>        
                                        <i class="fa fa-chess-knight fa-stack-1x fa-inverse"></i>        
                                    </span>
                                </div>
                                <div class="col-md-11">
                                    <h4>
                                        Ud puede olvidarse de cualquier problema, o demanda laboral, ya que ud no es el empleador de la persona que le presta su servicio.
                                    </h4>
                                </div>
                            </div>

                        </div>                        
                    </div>
                    <br/>

                    <div class="row">

                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-1">                            

                                    <span class="fa-stack fa-2x" >        
                                        <i class="fa fa-circle yeti fa-stack-2x text-primary"></i>        
                                        <i class="fa fa-calendar-alt fa-stack-1x fa-inverse"></i>        
                                    </span>
                                </div>
                                <div class="col-md-11">
                                    <h4>
                                        Ud contrata una persona , por el tiempo estrictamente necesario y ajustado a su presupuesto.
                                    </h4>
                                </div>
                            </div>                        
                        </div>                        
                    </div>
                    <br/>

                    <div class="row">                        
                        <div class="col-lg-12">

                            <div class="row">
                                <div class="col-md-1">                            

                                    <span class="fa-stack fa-2x" >        
                                        <i class="fa fa-circle yeti fa-stack-2x text-primary"></i>        
                                        <i class="fa fa-credit-card fa-stack-1x fa-inverse"></i>        
                                    </span>
                                </div>
                                <div class="col-md-11">
                                    <h4>
                                        Ud debe pagar electrónicamente su servicio, de manera que no habrá manejo de efectivo
                                    </h4>
                                </div>
                            </div>                                                      
                        </div>                        
                    </div>
                    <br/>

                </div>

                <div class="col-lg-5 text-left">
                    <div  class="panel panel-default">
                        <div class="panel-body">
                        <?php                     
                            echo Yii::$app->controller->renderPartial('simple_login', ['model' => $login_model,]);
                        ?>
                        </div>
                    </div>
                    
                    <div  class="panel panel-default">
                        <div class="panel-body">
                        <?php                     
                            echo Yii::$app->controller->renderPartial('signup', ['model' => $model,]);
                        ?>
                        </div>
                    </div>
                </div>
            </div>

            <br/>
            <br/>
            <br/>
            <br/>


            
        </div>

    </section>
    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Servicios</h2>
                    <h3 class="section-subheading text-muted">
                        Estos son los servicios que tenemos a dispocion (Estamos trabajando para añadir mas!)
                    </h3>
                </div>
            </div>
            <div class="row text-center">                
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle yeti fa-stack-2x text-primary"></i>
                        <i class="fa fa-home fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Domestico</h4>
                    <p class="text-muted">
                        Prestamos el servicio de aseo domestico, con esta contratacion te evitas todos las vueltas
                    </p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle yeti fa-stack-2x text-primary"></i>
                        <i class="fa fa-car fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Conductor</h4>
                    <p class="text-muted">
                        Puedes contratar conductores por dias, para que te ayuden conduciendo
                    </p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle yeti fa-stack-2x text-primary"></i>
                        <i class="fa fa-motorcycle fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Mensajeria</h4>
                    <p class="text-muted">
                        Puedes contratar personas que hagan tus "vueltas"
                    </p>
                </div>
            </div>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>

            

        </div>
    </section>


    <!-- About Section -->
    <section id="proceso">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">¿Como funciona?</h2>
                    <h3 class="section-subheading text-muted">Aqui te explicamos como puedes contratar con nosotros</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">

                        <li class="timeline-inverted">
                            <div class="timeline-image yeti">
                                <span class="fa-stack fa-5x">                                    
                                    <i class="fa fa-book fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Registrarse</h4>
                                    <h4 class="subheading">Unirse a la comunidad</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lo primero que tienes que hacer es registrarte en la pagina. Esto significa que dees crear un usuario y una contraseña, asi puedes volver cada vez e ingresar para uscar nuevos servicios </p>
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
                                    <h4>Dia o Plan</h4>
                                    
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Puedes escoger si solo necesitas tu servicio un dia especifico, o puedes seleccionar que el servicio sea recurrente.</p>
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
                                    <h4>Servicio</h4>
                                    <h4 class="subheading">Que tipo de servicio necesitas</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Ofrecemos gran variedad de servicios que te pueden ayudar con tu dia a dia</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <span class="fa-stack fa-5x">                                    
                                    <i class="fa fa-cogs fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Configuracion</h4>
                                    <h4 class="subheading">Configura tu servicio a tus nececidades</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">La configuracion del servicio es la parte mas importante, debes decirnso que dia lo necesitas, en que direccion y puedes escoger de una gran lista de empleados quien relaizar tu servicio</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <span class="fa-stack fa-5x">                                    
                                    <i class="fa fa-credit-card fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>El pago</h4>
                                    <h4 class="subheading">Debes pagar por tu servicio</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Debes hacer el pago de tu servicio un dia antes de que este llegue, si no recibimos tu pago el dia antes, no veremos obligado a cancelar tu servicio. Claro que te llamaremos y haremos todo lo posible por recordarte</p>
                                </div>
                            </div>
                        </li>                        
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>
                                    Listo!!
                                    <br>Es asi 
                                    <br>de facil
                                </h4>
                            </div>                            
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Your Website 2016</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Politica de privacidad</a>
                        </li>
                        <li><a href="#">Terminos de uso</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


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

    </body>

    </html>