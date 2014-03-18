<?php
session_start();
try {
    include("../recursos/funciones.php");
    require_once('../lib/nusoap.php');

    if (!isset($_SESSION["Usuario"])) {
        iraURL("../index.php");
    } elseif (!usuarioCreado()) {
        iraURL("../pages/create_user.php");
    }
	
    $wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
    $client = new SOAPClient($wsdl_url);
    $client->decode_utf8 = false;
    $Sedes = $client->ConsultarSedes();

    $reg = 0;
    if (isset($Sedes->return)) {
        $reg = count($Sedes->return);
    }
    $UsuarioRol = array('idusu' => $_SESSION["Usuario"]->return->idusu, 'sede' => $_SESSION["Sede"]->return->nombresed);
    $SedeRol = $client->consultarSedeRol($UsuarioRol);

    if (isset($SedeRol->return)) {
        if ($SedeRol->return->idrol->idrol == 0) {
            iraURL("../pages/inbox.php");
        }
    } else {
        iraURL("../index.php");
    }
    if ($_SESSION["Usuario"]->return->tipousu != "1" && $_SESSION["Usuario"]->return->tipousu != "2") {
        iraURL('../pages/inbox.php');
    }	
	include("../views/edit_user_administration.php");
	
} catch (Exception $e) {
    javaalert('Lo sentimos no hay conexión');
    iraURL('../index.php');
}
?>