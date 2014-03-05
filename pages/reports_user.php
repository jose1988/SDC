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
	
		$idUsu = array('idUsuario' => $idUsuario);
		$resultadoConsultarPaquetes = $client->listarEnviadoUsuarioXFecha($idUsu);
	
		if(!isset($resultadoConsultarPaquetes->return)){
			$paquetes = 0;
		}else{
			$paquetes = count($resultadoConsultarPaquetes->return);
		}
	
		$sinRespuesta = array('idUsuario' => $idUsuario,
							  'respuesta' => '0');
		$resultadoProcesadasSinRespuesta = $client->listarPaquetesProcesadosXRespuesta($sinRespuesta);	
		$resultadoNoProcesadasSinRespuesta = $client->listarPaquetesNoProcesadosXRespuesta($sinRespuesta);
		
		if(!isset($resultadoProcesadasSinRespuesta->return)){
			$procesadosSinRespuesta = 0;
		}else{
			$procesadosSinRespuesta = count($resultadoProcesadasSinRespuesta->return);
		}
	
		if(!isset($resultadoNoProcesadasSinRespuesta->return)){
			$noProcesadosSinRespuesta = 0;
		}else{
			$noProcesadosSinRespuesta = count($resultadoNoProcesadasSinRespuesta->return);
		}
	
		$conRespuesta = array('idUsuario' => $idUsuario,
							  'respuesta' => '1');
		$resultadoProcesadasConRespuesta = $client->listarPaquetesProcesadosXRespuesta($conRespuesta);
		$resultadoNoProcesadasConRespuesta = $client->listarPaquetesNoProcesadosXRespuesta($conRespuesta);
	
		if(!isset($resultadoProcesadasConRespuesta->return)){
			$procesadosConRespuesta = 0;
		}else{
			$procesadosConRespuesta = count($resultadoProcesadasConRespuesta->return);
		}
	
		if(!isset($resultadoNoProcesadasConRespuesta->return)){
			$noProcesadosConRespuesta = 0;
		}else{
			$noProcesadosConRespuesta = count($resultadoNoProcesadasConRespuesta->return);
		}
	
	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexion');
		//iraURL('../index.php');	
	}
	
	include("../views/reports_user.php");
	
} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexion');
	//iraURL('../index.php');	
}
?>