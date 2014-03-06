<?php
session_start();
include("../recursos/funciones.php");
require_once('../lib/nusoap.php');

if(!isset($_SESSION["Usuario"])){	
	iraURL("../index.php");
}elseif(!usuarioCreado()){
	iraURL("../pages/create_user.php");
}

$usuarioBitacora = $_SESSION["Usuario"]->return->idusu;
$sede = $_SESSION["Sede"]->return->idsed;
$idPaquete = '2';

if(isset($_POST["reportarPaqAus"])){
				
	if(isset($_POST["datosPaquete"]) && $_POST["datosPaquete"]!=""){
			
		try{
			$parametros = array('registroPaquete' => $idPaquete,
								'datosPaquete' => $_POST["datosPaquete"]);
			$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
			$client = new SOAPClient($wsdl_url);
			$client->decode_utf8 = false;
			$reportarPaqAus = $client->reportarPaqueteAusente($parametros);
				
			if($reportarPaqAus->return==1){
				javaalert('Paquete Reportado');
				llenarLog(7, "Paquete Ausente",$usuarioBitacora,$sede);
				iraURL('../pages/breakdown_valise.php');
			}
			else{
				javaalert('Paquete No Reportado');
				iraURL('../pages/breakdown_valise.php');
			}
				
		} catch (Exception $e) {
			javaalert('Lo sentimos no hay conexion');
			iraURL('../pages/breakdown_valise.php');
		}
	}
}
	
include("../views/packages_report.php");
?>