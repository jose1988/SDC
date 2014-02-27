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
	 $sede= array('idsed' => $_SESSION["Sede"]->return->idsed);
  $parametros=array('registroSede' => $sede);
   $Valijas = $client->xx($parametros); 
if(isset($Valijas->return)){
   if(count($Valijas->return)==1){
      $parametros=array('Id' =>$Valijas->return->origenval );
      $nombreSede = $client->consultaNombreSedeXId($parametros); 
    $Valijas->return->origenval=$nombreSede->return;
   }else{
    for ($i = 0; $i < count($Valijas->return); $i++) {
	$parametros=array('Id' =>$Valijas->return[$i]->origenval );
      $nombreSede = $client->consultaNombreSedeXId($parametros); 
    $Valijas->return[$i]->origenval=$nombreSede->return;
	}
   }
   }
  // echo '<pre>';
//print_R($Valijas);
   include("../views/suitcase_overdue_destination.php");
  /*} catch (Exception $e) {
					javaalert('Error al crear el documento');
				//	iraURL('../pages/index.php');
}*/
?>
