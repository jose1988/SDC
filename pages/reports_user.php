<?php
session_start();
include("../recursos/funciones.php");
require_once('../lib/nusoap.php');

/*if(!isset($_SESSION["Usuario"])){	
	iraURL("index.php");
}*/

try {
	$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
  	$client = new SOAPClient($wsdl_url);
  	$client->decode_utf8 = false;
	
	$usuario = array('user' => 'niuskam');
	$resultadoConsultarUsuario = $client->consultarUsuarioXUser($usuario);
	
	if(!isset($resultadoConsultarUsuario->return)){
		$usua = 0;
	}else{
		$usua = $resultadoConsultarUsuario->return;
	}
	
	$idUsuario = $resultadoConsultarUsuario->return->idusu;
		
	$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/Niuska?WSDL';
  	$client = new SOAPClient($wsdl_url);
  	$client->decode_utf8 = false;
	
	$idUsu = array('idUsuario' => $idUsuario);
	$resultadoConsultarPaquetes = $client->listaPaquetesXUsuarioYFechaProcesadas($idUsu);
	
	if(!isset($resultadoConsultarPaquetes->return)){
		$paquetes = 0;
	}else{
		$paquetes = count($resultadoConsultarPaquetes->return);
	}
	
	include("../views/reports_user.php");
	
} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('index.php');	
}
?>