<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
session_start();

include("../recursos/funciones.php");
require_once('../lib/nusoap.php');
if(!isset($_SESSION["Usuario"])){
	iraURL("../index.php");
}elseif(!usuarioCreado()){
	iraURL("../pages/create_user.php");
	}
try {
$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
$client = new SOAPClient($wsdl_url);
$client->decode_utf8 = false;
  $parametros=array('idSede' => $_SESSION["Sede"]->return->idsed);
   $Valijas = $client->valijasXFechaVencidaXUsuarioOrigen($parametros); 
//   echo '<pre>';
//print_r($Valijas);
    include("../views/suitcase_overdue_origin.php");
  } catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../pages/inbox.php');
}
?>
