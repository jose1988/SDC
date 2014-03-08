<?php
session_start();
include("../recursos/funciones.php");
require_once('../lib/nusoap.php');

if(!isset($_SESSION["Usuario"])){	
	iraURL("../index.php");
}elseif(!usuarioCreado()){
	iraURL("../pages/create_user.php");
}

$idPaquete = $_POST["id"];

if($idPaquete==""){
	//iraURL('../pages/inbox.php');
}
else{
	try{
		$parametros = array('idPaquete' => $idPaquete);
		$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
		$client = new SOAPClient($wsdl_url);
		$client->decode_utf8 = false;
		$resultadoPaquete = $client->consultarPaqueteXId($parametros);
	
		if(!isset($resultadoPaquete->return)){
			$paquete = 0;
		}else{
			$paquete = $resultadoPaquete->return;
		}
	
		$resultadoAdjunto = $client->consultarAdjuntoXPaquete($parametros);
	
		if(!isset($resultadoAdjunto->return)){
			$adjunto = 0;
		}else{
			$adjunto = $resultadoAdjunto->return;
		}
	
		include("../views/see_package.php");
				
	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexion');
		iraURL('../pages/inbox.php');
	}
}
?>