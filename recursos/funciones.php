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

?>