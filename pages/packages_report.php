<?php
session_start();
include("../recursos/funciones.php");
require_once('../lib/nusoap.php');

/*if(!isset($_SESSION["Usuario"])){	
	iraURL("index.php");
}*/
	
	if(isset($_POST["reportarPaqAus"])){
				
		if(isset($_POST["datosPaquete"]) && $_POST["datosPaquete"]!=""){
			
			try{
				$parametros = array('registroPaquete' => '2',
									'datosPaquete' => $_POST["datosPaquete"]);
				$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/Niuska?WSDL';
				$client = new SOAPClient($wsdl_url);
				$client->decode_utf8 = false;
				$reportarPaqAus = $client->reportarPaqueteAusente($parametros);
				
				if($reportarPaqAus->return==1){
					javaalert('Paquete Reportado');
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