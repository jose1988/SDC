<?php
session_start();
include("../recursos/funciones.php");
require_once('../lib/nusoap.php');

/*if(!isset($_SESSION["Usuario"])){	
	iraURL("index.php");
}*/

if(isset($_POST["confirmar"])){
				
	if(isset($_POST["cValija"]) && $_POST["cValija"]!="" && isset($_POST["cZoom"]) && $_POST["cZoom"]!=""){
			
		try{
			$parametros = array('idValija' => $_POST["cValija"],
								'codZoom' => $_POST["cZoom"]);
			$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/Niuska?WSDL';
			$client = new SOAPClient($wsdl_url);
			$client->decode_utf8 = false;
			$confirmarValija = $client->confirmarValija($parametros);
				
			if(isset($confirmarValija->return)==1){
				javaalert('Valija Confirmada');
				iraURL('index.php');
			}
			else{
				javaalert('Valija No Confirmada');
				iraURL('index.php');
			}
				
		} catch (Exception $e) {
			javaalert('Lo sentimos no hay conexión');
			iraURL('index.php');
		}
	}
}

include("../views/confirm_valise.php");
?>