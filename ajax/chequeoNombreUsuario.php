<?php
sleep(1);
if(isset($_POST['nombre'])&& $_POST['nombre']!="") {
        require_once('../lib/nusoap.php'); 
	    $wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
				$client = new SOAPClient($wsdl_url);
				$client->decode_utf8 = false; 
				$Nombre= array('user' => $_POST['nombre']);
				$rowUsuario = $client->consultarUsuarioXUser($Nombre);
				
				if($rowUsuario->return->idusu!="No"){
				echo '<div id="Error" > No disponible </div>';
				}else{
				echo '<div id="Success" >Disponible </div>';
				} 
				
			}else{
					  echo '<div></div>';
			}

?>