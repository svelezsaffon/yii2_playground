function enviarEmail(user_id){
   		
   		SimpleLoading.start('default');    	
    	$.post("index.php?r=cuentaverificada/sendemail",
              function( data ) {
                  SimpleLoading.stop();
                  alert("El email ha sido reenviado");
              }
          );
}