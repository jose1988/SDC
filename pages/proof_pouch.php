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
	
	$usuario = array('user' => 'niuska.mora');
	$resultadoConsultarUsuario = $client->consultarUsuarioXUser($usuario);
	
	if(!isset($resultadoConsultarUsuario->return)){
		$usua = 0;
	}else{
		$usua = $resultadoConsultarUsuario->return;
	}
	
	$idUsuario = $resultadoConsultarUsuario->return->idusu;
	
	try {
		$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/Niuska?WSDL';
  		$client = new SOAPClient($wsdl_url);
  		$client->decode_utf8 = false;
	
		$idUsu = array('idUsuario' => $idUsuario);
		$resultadoConsultarUltimaValija = $client->ultimaValijaXUsuario($idUsu);
		
		$idSede = array('idSede' => '2');
		$resultadoConsultarSede = $client->consultarSedeXId($idSede);
	
		
	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexión');
		iraURL('../index.php');	
	}
	
	include("../views/proof_pouch.php");
	
} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../index.php');	
}
?>