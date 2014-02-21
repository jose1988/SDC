<?php
session_start();
include("../recursos/funciones.php");
require_once('../lib/nusoap.php');

/*if(!isset($_SESSION["Usuario"])){	
	iraURL("index.php");
}*/
	try {
		$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/Niuska?WSDL';
  		$client = new SOAPClient($wsdl_url);
  		$client->decode_utf8 = false;
	
		$idSede = array('registroSede' => '1');
		$resultadoConsultarValijas = $client->listarValijasXFechaYUsuarioSede($idSede);
	
		if(!isset($resultadoConsultarValijas->return)){
			$valijas = 0;
		}else{
			$valijas = count($resultadoConsultarValijas->return);
		}
		
		$resultadoValijasNoProcesadas = $client->listarValijasNoProcesadas($idSede);
		if(!isset($resultadoValijasNoProcesadas->return)){
			$valijasNoProcesadas = 0;
		}else{
			$valijasNoProcesadas = count($resultadoValijasNoProcesadas->return);
		}
		
		$resultadoValijasProcesadas = $client->listarValijasProcesadas($idSede);
		if(!isset($resultadoValijasProcesadas->return)){
			$valijasProcesadas = 0;
		}else{
			$valijasProcesadas = count($resultadoValijasProcesadas->return);
		}
	
	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexión');
		iraURL('../index.php');	
	}
	
	include("../views/reports_valise.php");

?>