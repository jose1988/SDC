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

		$parametros = array('idUsuario' => $idUsuario);
		$resultadoPaquetesConfirmados = $client->listaPaquetesXUsuarioYFechaProcesadas($parametros);
		
		if(!isset($resultadoPaquetesConfirmados->return)){
			$paquetes = 0;
		}else{
			$paquetes = count($resultadoPaquetesConfirmados->return);
		}
		
	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexión');
		iraURL('../index.php');	
	}
	
	include("../views/print_operator_level.php");
	
	if(isset($_POST["imprimir"]) && isset($_POST["ide"])){
		$imprimirPaquetes = $_POST["ide"];
		$_SESSION["paquetesConfirmados"] = $resultadoPaquetesConfirmados;
		$_SESSION["paquetes"] = $imprimirPaquetes;
		iraURL('proof_operator_level.php');
	}	
	
} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../index.php');	
}
?>