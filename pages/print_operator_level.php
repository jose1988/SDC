<?php
session_start();
include("../recursos/funciones.php");
require_once('../lib/nusoap.php');

if(!isset($_SESSION["Usuario"])){	
	iraURL("../index.php");
}elseif(!usuarioCreado()){
	iraURL("../pages/create_user.php");
}

$nomUsuario = $_SESSION["Usuario"]->return->userusu;
$_SESSION["paquetesConfirmados"] = "";
$_SESSION["paquetes"] = "";

try {
	$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
  	$client = new SOAPClient($wsdl_url);
  	$client->decode_utf8 = false;
	
	$usuario = array('user' => $nomUsuario);
	$resultadoConsultarUsuario = $client->consultarUsuarioXUser($usuario);
	
	if(!isset($resultadoConsultarUsuario->return)){
		$usua = 0;
	}else{
		$usua = $resultadoConsultarUsuario->return;
	}
	
	$idUsuario = $resultadoConsultarUsuario->return->idusu;
	
	try {
		$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
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
		javaalert('Lo sentimos no hay conexion');
		iraURL('../pages/operator_level.php');	
	}
	
	if(isset($_POST["imprimir"])){
		
		if(isset($_POST["ide"])){
			
			$imprimirPaquetes = $_POST["ide"];
			$_SESSION["paquetesConfirmados"] = $resultadoPaquetesConfirmados;
			$_SESSION["paquetes"] = $imprimirPaquetes;
			echo"<script>window.open('../pages/proof_operator_level.php');</script>";			
			
		}else{
			javaalert("Debe seleccionar al menos un paquete, por favor verifique");
		}
	}
	
	include("../views/print_operator_level.php");
	
} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexion');
	iraURL('../pages/operator_level.php');	
}
?>