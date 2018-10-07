
<style>
  .text-wrap {
    white-space: normal;
  }

</style>


<div class="jumbotron">

  <div class="jumbotron alert bg">
    <header>
      <div class="container">
        <h2 class="text-center">En 4 sencillos pasos puedes contratar un servicio con nostros</h2>
      </div>
    </header>
  </div>
  <div class="container">

    <div class="row">  

      <div class="col-xs-12">


        <p class="lead text-center bg-info alert text-info center-block">
          1: Decidir que servicio necesitas <span class="glyphicon glyphicon-search" aria-hidden="true"></span>

        </p>

        <div class="row">

          <?php 
          $max = sizeof($allServicios);
          $div=12/$max;                        
          $var='
          <div class="col-xs-'.$div.' text-center">
            <p class="alert center-block"><span class="glyphicon glyphicon-arrow-down"></span></p>
          </div>
          ';                        
          foreach ($allServicios as $servicioe){
            echo $var;
          }
          ?>

        </div>

      </div>
      
    </div>

    <div class="row">

      <?php 
      foreach ($allServicios as $servicio){
        $var='
        <div class="col-xs-'.$div.' text-center">
          <p class="center-block"><span class="well">'.$servicio->nombre.'</span></p>
          <p class="alert center-block"><span class="glyphicon glyphicon-arrow-down"></span></p>
        </div>
        ';                        

        echo $var;
      }
      ?>
    </div>

  </div>


  <div class="container">    
    <div class="row">
      <div class="col-xs-12">
        <p class="lead text-center bg-info alert text-info center-block">
          Paso 2: Seleccionar el turno, el dia y la recurrencia de tu servicio
        </p>

        <div class="row">
          <div class="col-xs-4 text-center">
            
            <p class="alert center-block"><span class="glyphicon glyphicon-arrow-down"></span></p>
            
          </div>                
          <div class="col-xs-4 text-center">
            
            <p class="alert center-block"><span class="glyphicon glyphicon-arrow-down"></span></p>
            
          </div>

          <div class="col-xs-4 text-center">
            
            <p class="alert center-block"><span class="glyphicon glyphicon-arrow-down"></span></p>  
            
          </div>

        </div>

        <div class="row">

          <div class="col-xs-4 text-center">                    
            <p class="center-block">
              <span class="well">
                Mañana - 8:00am a 12:00pm
              </span>
              <p class="alert center-block"><span class="glyphicon glyphicon-arrow-down"></span></p>
            </p>
          </div>

          <div class="col-xs-4 text-center">                    
            <p class="center-block">
              <span class="well">
                Tarde - 1:30pm a 5:30pm
              </span>
              <p class="alert center-block"><span class="glyphicon glyphicon-arrow-down"></span></p>
            </p>
          </div>

          <div class="col-xs-4 text-center">                    
            <p class="center-block">
              <span class="well">
                Dia - 8:00am a 5:00pm
              </span>
              <p class="alert center-block"><span class="glyphicon glyphicon-arrow-down"></span></p>
            </p>
          </div>
        </div>  

        <div class="row">

          <div class="col-xs-12 text-center">                    
            <p class="lead text-center well alert center-block">
              
              Selecciona el dia que necesitas tu servicio
              
              <p class="alert center-block"><span class="glyphicon glyphicon-arrow-down"></span></p>
            </p>
          </div>

        </div>  

      </div>
    </div>
  </div>

  <div class="container">    
    <div class="row">
      <div class="col-xs-12">
        <p class="lead text-center bg-info alert text-info center-block">
          Paso 3: Selecciona a la direccion donde necesitas tu servicio
        </p>

        <div class="row">
          <div class="col-xs-12 text-center">
            
            <p class="alert center-block"><span class="glyphicon glyphicon-arrow-down"></span></p>
            
          </div>

        </div>

      </div>
    </div>
  </div>

  <div class="container">    
    <div class="row">
      <div class="col-xs-12">
        <p class="lead text-center bg-info alert text-info center-block">
          Paso 4: Selecciona a la persona que quiseras que hicera tu servicio
        </p>

        <div class="row">
          <div class="col-xs-12 text-center">
            
            <p class="alert center-block"><span class="glyphicon glyphicon-arrow-down"></span></p>
            
          </div>

        </div>

      </div>
    </div>
  </div>

  <div class="container">    
    <div class="row">
      <div class="col-xs-12">
        <p class="lead text-center bg-info alert text-info center-block">
         Listo! espera tu servicio
       </p>
     </div>
   </div>

   <div class="row">
    <div class="col-xs-12 text-center">
      
      <p class="alert center-block"><span class="glyphicon glyphicon-arrow-down"></span></p>
      
    </div>

  </div>

  <div class="row">
    <div class="col-xs-12">          
     <a class="btn btn-success" href="/basic/web/index.php?r=site%2Fsignup">Create Plane</a>
   </div>
 </div>



</div>


</div>