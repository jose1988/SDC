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

if(isset($_POST["reportarPaqAus"])){
				
	if(isset($_POST["datosPaquete"]) && $_POST["datosPaquete"]!=""){
			
		try{
			$parametros = array('registroPaquete' => '2',
								'datosPaquete' => $_POST["datosPaquete"]);
			$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
			$client = new SOAPClient($wsdl_url);
			$client->decode_utf8 = false;
			$reportarPaqAus = $client->reportarPaqueteAusente($parametros);
				
			if($reportarPaqAus->return==1){
				javaalert('Paquete Reportado');
				llenarLog(7, "Paquete Ausente",$usuarioBitacora,$sede);
				iraURL('../index.php');
			}
			else{
				javaalert('Paquete No Reportado');
				iraURL('../index.php');
			}
				
		} catch (Exception $e) {
			javaalert('Lo sentimos no hay conexión');
			iraURL('../index.php');
		}
	}
}
	
include("../views/packages_report.php");
?>