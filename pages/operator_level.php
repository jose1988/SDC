<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
session_start();

include("../recursos/funciones.php");
require_once('../lib/nusoap.php');
if(!isset($_SESSION["Usuario"])){
	iraURL("../index.php");
}
//try {
$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/mariela?WSDL';
$client = new SOAPClient($wsdl_url);
$client->decode_utf8 = false; 
  $usu= array('idusu' => $_SESSION["Usuario"]->return->idusu);
  $parametros=array('idUsuario' => $usu);
   $PaquetesConfirmados = $client->consultarPaquetesXUsuarioProcesadasAlDia($parametros); 

   include("../views/operator_level.php");
  /*} catch (Exception $e) {
					javaalert('Error al crear el documento');
				//	iraURL('../pages/index.php');
}*/
?>
