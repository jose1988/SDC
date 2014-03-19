<?php

session_start();
//try{
include("../recursos/funciones.php");
require_once("../lib/nusoap.php");
$Sedes = $_SESSION["Sedes"];
// echo '<pre>'; print_r($Sedes); 
try {
    if (isset($_POST["Biniciar"])) {
        if (isset($_POST["sede"]) && $_POST["sede"] != "") {
            for ($i = 0; $i < count($Sedes->return); $i++) {
                if ($Sedes->return[$i]->idsed == $_POST["sede"]) {
                    $_SESSION["Sede"] = $Sedes->return[$i];
                    break;
                }
            }

            $wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
            $client = new SOAPClient($wsdl_url);
            $client->decode_utf8 = false;
            $id = array('idSede' => $_SESSION["Sede"]->idsed);
            $_SESSION["Sede"] = $client->consultarSedeXId($id);
			 $UsuarioRol = array('idusu' => $_SESSION["Usuario"]->return->idusu, 'sede' => $_SESSION["Sede"]->return->nombresed);
				$SedeRol = $client->consultarSedeRol($UsuarioRol);
				 if ($SedeRol->return->idrol->idrol == "2" || $SedeRol->return->idrol->idrol == "5") {
  iraURL("headquarters_operator.php");
 }elseif ($SedeRol->return->idrol->idrol == "1" || $SedeRol->return->idrol->idrol == "3") {
  iraURL("operator_level.php");
 }else{
 javaalert("No tiene privilegios para entrar");
 }

        } else {
            javaalert('Debe escojer la sede');
        }
    }
} catch (Exception $e) {
    javaalert('Lo sentimos no hay conexión');
    iraURL('../pages/index2.php');
}


include("../views/headquarters.php");
?>
