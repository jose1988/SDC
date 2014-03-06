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
$usuarioBitacora = $_SESSION["Usuario"]->return->idusu;
$sede = $_SESSION["Sede"]->return->idsed;

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


	if(isset($_POST["reportarPaqExc"])){
				
		if(isset($_POST["cPaquete"]) && $_POST["cPaquete"]!=""){
			
			try{
				$parametros = array('registroPaquete' => $_POST["cPaquete"],
									'registroUsuario' => $idUsuario);
				$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
				$client = new SOAPClient($wsdl_url);
				$client->decode_utf8 = false;
				$reportarPaqExc = $client->reportarPaqueteExcedente($parametros);
				
				if($reportarPaqExc->return==1){
					javaalert('Paquete Reportado y Reenviado');
					llenarLog(7, "Paquete Excedente",$usuarioBitacora,$sede);
					iraURL('../index.php');
				}
				else{
					javaalert('Paquete No Reportado y No Reenviado');
					iraURL('../index.php');
				}
				
			} catch (Exception $e) {
				javaalert('Lo sentimos no hay conexión');
				iraURL('../index.php');
			}
		}
	}
	
	if(isset($_POST["reportarValija"])){
				
		if(isset($_POST["cValija"]) && $_POST["cValija"]!=""){
			
			try{
				$parametros = array('registroValija' => $_POST["cValija"],
									'registroUsuario' => $idUsuario);
				$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
				$client = new SOAPClient($wsdl_url);
				$client->decode_utf8 = false;
				$reportarValija = $client->reportarValija($parametros);
				
				if($reportarValija->return==1){
					javaalert('Valija Reportada y Reenviada');
					llenarLog(7, "Valija Erronea",$usuarioBitacora,$sede);
					iraURL('../index.php');
				}
				else{
					javaalert('Valija No Reportada y No Reenviada');
					iraURL('../index.php');
				}
				
			} catch (Exception $e) {
				javaalert('Lo sentimos no hay conexion');
				iraURL('../index.php');
			}
		}
	}

	include("../views/valise_report.php");
	
} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexion');
	iraURL('../index.php');	
}
?>