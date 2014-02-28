<?php
//función que direcciona a una pagina especifica
function iraURL($url){
	$ini='<script language="javascript">
				window.location = "';
	$fin='"; </script>';
	
	echo $ini.$url.$fin;
}

//alertas
function javaalert($msj){
	$ini='<script language="javascript">	alert("';
	$fin='"); </script>';
	echo $ini.$msj.$fin;
}
//Verificando que tenga la sesión abierta
function existeSesion(){
	if(isset($_SESSION["Usuario"]))
		return true;
	else
		return false;
}
//eliminando variable de sesion 
function eliminarSesion(){
    if(isset($_SESSION["Usuario"])){
	unset($_SESSION["Usuario"]);
	}
	
}

//bitacora del  sitio web
function llenarLog($accion,$observacion,$usuario,$sede){

		switch($accion){
		case 1:
			$accion="INSERCION";
			break;
		case 2:
			$accion="CONFIRMACION";
			break;
		case 3:
			$accion="BORRADO";
			break;
		case 4:
			$accion="INICIO DE SESION";
			break;
		case 5:
			$accion="FIN DE SESION";
			break;
		case 6:
			$accion="COMPROBANTE";
			break;
		case 7:
			$accion="REPORTE";
			break;	
		case 8:
			$accion="VACIO DE BITACORA";
			break;	
		}

		$parametros = array('idSede' => $sede,
				'idUsu' => $usuario,
				'accion' => $accion,
				'observacion' => $observacion);
		$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
  		$client = new SOAPClient($wsdl_url);
  		$client->decode_utf8 = false;
		$registroBitacora = $client->insertarBitacora($parametros);
}

?>