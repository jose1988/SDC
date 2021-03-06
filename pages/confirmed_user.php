<?php

session_start();

include("../recursos/funciones.php");
require_once('../lib/nusoap.php');
if (!isset($_SESSION["Usuario"])) {
    iraURL("../index.php");
} elseif (!usuarioCreado()) {
    iraURL("../pages/create_user.php");
}

try {
    $wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
    $client = new SOAPClient($wsdl_url);
    $client->decode_utf8 = false;
    $UsuarioRol = array('idusu' => $_SESSION["Usuario"]->return->idusu, 'sede' => $_SESSION["Sede"]->return->nombresed);
    $SedeRol = $client->consultarSedeRol($UsuarioRol);
    if (isset($SedeRol->return)) {
        if ($SedeRol->return->idrol->idrol != "1" && $SedeRol->return->idrol->idrol != "2" && $SedeRol->return->idrol->idrol != "3" && $SedeRol->return->idrol->idrol != "5") {
            iraURL('../pages/inbox.php');
        }
    } else {
        iraURL('../pages/inbox.php');
    }
    $usuSede = array('iduse' => $SedeRol->return->iduse);
    $parametros = array('idUsuarioSede' => $usuSede);
    $PaquetesConfirmados = $client->consultarPaquetesConfirmadosXUsuarioSede($parametros);
    include("../views/confirmed_user.php");
} catch (Exception $e) {
    javaalert('Lo sentimos no hay conexion');
    iraURL('../pages/inbox.php');
}
?>