<?php
session_start();
include("../recursos/funciones.php");
require_once('../lib/nusoap.php');

if(!isset($_SESSION["Usuario"])){	
	iraURL("../index.php");
}elseif(!usuarioCreado()){
	iraURL("../pages/create_user.php");
}

$paquetes = $_SESSION["paquetes"];
$paquetesConfirmados = $_SESSION["paquetesConfirmados"];
$usuarioBitacora = $_SESSION["Usuario"]->return->idusu;
$sede = $_SESSION["Sede"]->return->idsed;

try {
	$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/Niuska?WSDL';
  	$client = new SOAPClient($wsdl_url);
  	$client->decode_utf8 = false;
	$i = 0;
	$contadorPaq = 0;
	$paquetesTotales = "";
		
	for($j=0; $j<count($paquetesConfirmados->return); $j++){
		if(isset($paquetes[$j])){
			$idPaquete = array('idPaquete' => $paquetes[$j]);
			$resultadoPaquete = $client->consultarPaqueteXId($idPaquete);
			$paquetesTotales[$i] = $resultadoPaquete->return;
			$idPaq[$i] = $resultadoPaquete->return->idpaq;
			if(isset($resultadoPaquete->return->idpaqres->idpaq)){
				$idPaqRes[$i] = $resultadoPaquete->return->idpaqres->idpaq;
			}else{
				$idPaqRes[$i] = "";
			}
			$origen[$i] = $resultadoPaquete->return->origenpaq->nombreusu;
			if(isset($resultadoPaquete->return->destinopaq->idusubuz->nombreusu)){
				$destino[$i] = $resultadoPaquete->return->destinopaq->idusubuz->nombreusu;
			}else{
				$destino[$i] = "";
			}
			if(isset($resultadoPaquete->return->destinopaq->idusubuz->direccionusu)){
				$direccion[$i] = $resultadoPaquete->return->destinopaq->idusubuz->direccionusu;
			}else{
				$direccion[$i] = "";
			}
			if(isset($resultadoPaquete->return->destinopaq->idusubuz->telefonousu)){
				$telefono[$i] = $resultadoPaquete->return->destinopaq->idusubuz->telefonousu;
			}else{
				$telefono[$i] = "";
			}
			$i++;
			$contadorPaq++;
		}
		if($contadorPaq==count($paquetes)){
			break;
		}
	}

	if($paquetesTotales != ""){
		$contadorPaquetes = count($paquetesTotales);
		llenarLog(6, "Comprobante Nivel 1",$usuarioBitacora,$sede);
	}
	else{
		$contadorPaquetes = 0;
	}
	include("../views/proof_operator_level.php");
	
} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../index.php');	
}
?>