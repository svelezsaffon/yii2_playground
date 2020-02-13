function getDireccionName(id){
      $.get("index.php?r=direccion/getname&id="+id,
              function( data ) {                  
                  update_pasos('text3q',data);
              }
          );
}

function getEmpleadoName(id){
      $.get("index.php?r=trabajador/getname&id="+id,
              function( data ) {                  
                  update_pasos('text4q',data);
              }
          );
}

function verify_all_step3_dias(dir_id) {

    var boxesEL=document.getElementsByName('Servicioxdia[servicio]');    

    var found=false;

    var servicio;

    for(var x=0; x < boxesEL.length; x++)
    {   
      found=found || boxesEL[x].checked;

          if(found){
            servicio=boxesEL[x].value;
            break;
          }
    }
    

    if(found){

    	var fecha = document.getElementById('servicioxdia-fecha_inicia').value;
      
    	document.getElementById('meserv3').style.display="none"; 
	
   		SimpleLoading.start('default');
    	 
    	$.get("index.php?r=servicioxdia/getempleados&servicio="+servicio+"&dir="+dir_id+"&fecha="+fecha,
              function( data ) {
                  SimpleLoading.stop();
                  getDireccionName(dir_id);
                  $("#servicioxdia-trabajador" ).html(data);                                    
              }
          );

    }

    
    var axu=document.getElementById('nextstep3');
    axu.disabled=!found;      

}

function verify_all_step3_planes() {
    
    var boxesEL=document.getElementsByName('Plane[servicio]');   
    
    var found=false;

    var servicio;

    for(var x=0; x < boxesEL.length; x++)   
    {   
      found=found || boxesEL[x].checked;
      if(found){
        		servicio=boxesEL[x].value;
        		break;
      }
    }

    if(found){   		 
    
    	var fecha = document.getElementById('plane-fecha_inicia').value;
    	

    	document.getElementById('meserv3').style.display="none";    
	
   		SimpleLoading.start('default');
    	
    	$.get("index.php?r=plane/getempleados&servicio="+servicio+"&fecha="+fecha,
              function( data ) {
                  SimpleLoading.stop();
                  $("#plane-trabajador" ).html(data);                                    
              }
          );

    }

    
    
    var axu=document.getElementById('nextstep3');
    axu.disabled=!found;  

}