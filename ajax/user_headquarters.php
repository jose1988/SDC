

	 <?php
	 session_start();
	 include("../recursos/funciones.php");
require_once('../lib/nusoap.php');
$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $aux= $_POST['sed'];
  
 $Sede= array('sede' => $aux);
  $_SESSION["sedeb"]=$aux;
  $Usuarios = $client->consultarUsuariosXSede($Sede);
 javaAlert("entro al ajax".$aux);
  $reg=0;
	if(isset( $Usuarios->return)){
	  $reg=count( $Usuarios->return);
	  
	  }
	  echo "<option value='' style='display:none'>Seleccionar:</option>";
	  	if($reg>1){
			
									$i=0;
								  while($reg>$i){
								
						echo '<option value="'.$Usuarios->return[$i]->idusu.'">'.$Usuarios->return[$i]->userusu.'</option>';
						$i++;
						
								  }
								}
								else{
							echo '<option value="'.$Usuarios->return->idusu.'">'.$Usuarios->return->userusu.'</option>';	  
								}

		  
  ?>  
 


    
 

